@extends('admin.layout.master')
@section('content')
    <div class="title-left">
        <h2>{{isset($category_of_blog_edit) ? "Cập nhật danh mục (Blog)" : "Thêm mới danh mục (Blog)"}}</h2>
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{isset($category_of_blog_edit) ? "Update Category(Blog)" : "Create Category (Blog)"}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                
                <form action="{{isset($category_of_blog_edit) ? route('category_of_blog.update',$category_of_blog_edit->id) : route('category_of_blog.store')}}"  method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12  form-group">
                        <input type="text" class="form-control" value="{{isset($category_of_blog_edit) ? $category_of_blog_edit->name : ""}}" name="name" id="inputSuccess2" placeholder="Tên danh mục (Blog)">
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="col-md-12 col-sm-12  form-group">
                        <div class="checkbox">
                            <h4>
                                <input type="checkbox" @if(isset($category_of_blog_edit)) {{$category_of_blog_edit->status==1 ? "checked" : ""}} @endif  name="status" value="1" class="mr-3">Trạng thái
                            </h4>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row justify-content-center">
                        <div class="">
                            <a href="{{route('category_of_blog.index')}}"><button type="button" class="primary-btn custom-primary-btn p-2 text-white">Cancel</button></a>
                            <button class="primary-btn custom-primary-btn p-2 text-white" type="reset">Reset</button>
                            <button type="submit" class="primary-btn custom-primary-btn p-2 text-white">Sumit</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection