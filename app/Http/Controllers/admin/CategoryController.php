<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::query();
        $categories = $categories->latest()->paginate(5);
        return view('admin.category.list',compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string'],
            'slug' => ['required','string','unique:categories,slug'],
        ]);
        if($validator->passes()){
            $category = Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status,
            ]);
            $request->session()->flash('success',"Category added successfully");

            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }
    }
    public function edit(){}
    public function update(){}
    public function destroy(){}
}
