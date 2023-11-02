@extends('admin.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('category.create')}}" class="btn btn-primary">New Category</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
            <form action="" method="get" id="searchForm" name="searchForm">
                <div class="card-header ">
                    <div class="card-title">
                        <button type="reset" class="btn btn-default btn-sm" onclick="window.location.href='{{route('category.list')}}'">Reset</button>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="search" value="{{Request::get('search')}}" class="form-control float-right" placeholder="Search" id="search">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div id="ajaxTable">
                @include('admin.category.category-table')
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@section('contentJS')
<script>
    // $('#search').on('keyup',function(){
    //     var value = $(this).val();
       
    //     $.ajax({
    //         url: '{{route("category.list")}}',
    //         type: 'get',
    //         dataType: 'ajax',
    //         data: {'search':value},
    //         success:function(response){
    //             $('#ajaxTable').html(response.data);
    //             // $("#ajaxTable").html(response.data);
    //             if(response.status == true){
                    
    //             }
    //             // console.log(response);
                
    //         }
    //     });
    // });
</script>
@endsection
@endsection