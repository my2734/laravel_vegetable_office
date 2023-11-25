@extends('admin.layout.master')
@section('content')
<div class="title-left">
    @if(isset($category_of_blog_edit))
    <h2>Cập nhật danh mục (Blog)</h2>
    @else
    <h2>Thêm mới danh mục (Blog)</h2>
    @endif
</div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            @if(isset($category_of_blog_edit))
            <h2>Cập nhật danh mục (Blog)</h2>
            @else
            <h2>Thêm mới danh mục (Blog)</h2>
            @endif
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

            <form action="{{isset($category_of_blog_edit) ? route('category_of_blog.update',$category_of_blog_edit->id) : route('category_of_blog.store')}}" method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12  form-group">
                    <input type="text" class="form-control" value="{{isset($category_of_blog_edit) ? $category_of_blog_edit->name : ''}}" name="name" id="inputSuccess2" placeholder="Tên danh mục (Blog)">
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="col-md-12 col-sm-12  form-group">
                    <div class="checkbox">
                        <h4>
                            <input type="checkbox" @if(isset($category_of_blog_edit)) {{$category_of_blog_edit->status==1 ? "checked" : ""}} @endif name="status" value="1" class="mr-3">@lang('lang.Status')
                        </h4>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group row justify-content-center">
                    <div class="">
                        <a href="{{route('category_of_blog.index')}}">
                            <button type="button" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.cancel')</button>
                        </a>
                        <button class="primary-btn custom-primary-btn p-2 text-white" type="reset">@lang('lang.reset')</button>
                        <button type="submit" class="primary-btn custom-primary-btn p-2 text-white btn-store-categoryblog">@lang('lang.submit')</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection