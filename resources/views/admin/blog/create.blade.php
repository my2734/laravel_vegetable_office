@extends('admin.layout.master')

@section('content')
<div class="title-left">
    @if(isset($blog_edit))
    <h2>@lang('lang.update_blog')</h2>
    @else
    <h2>@lang('lang.create_blog')</h2>
    @endif
</div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            @if(isset($blog_edit))
            <h2>@lang('lang.update_blog')</h2>
            @else
            <h2>@lang('lang.create_blog')</h2>
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

            <form action="{{isset($blog_edit) ? route('blog.update',$blog_edit->id) : route('blog.store')}}" method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <input type="text" class="form-control" value="{{isset($blog_edit) ? $blog_edit->title : old('title')}}" name="title" id="inputSuccess2" placeholder="Tên Blog">
                    @if($errors->has('title'))
                    <span class="text-danger">{{$errors->first('title')}}</span>
                    @endif
                </div>
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        @if(isset($blog_edit))
                        <label class="custom-file-label" for="customFile">@lang('lang.have_image')</label>
                        @else 
                        <label class="custom-file-label" for="customFile">@lang('lang.choose_image')</label>
                        @endif
                        @if($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 col-sm-12  mt-2 form-group">
                    <select class="select2_single form-control" name="cat_id" tabindex="-1">
                        @if(!isset($blog_edit)) <option>@lang('lang.about_category')</option> @endif
                        @foreach($category_of_blogs as $key => $category_of_blog)
                        <option @if(isset($blog_edit)) {{($blog_edit->cat_id == $category_of_blog->id) ? "selected" : ""}} @endif value="{{$category_of_blog->id}}">{{$category_of_blog->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cat_id'))
                    <span class="text-danger">{{$errors->first('cat_id')}}</span>
                    @endif
                </div>
                <div class="col-md-12 col-sm-12  form-group">
                    <h4 for="">Tags Blogs</h4>
                    @foreach($tagses as $key => $tags)
                    <span class="checkbox mr-4" style="font-size: 16px;">
                        <input type="checkbox" {{(isset($tags_of_blog) && ($tags_of_blog->contains($tags->id)) ? "checked" : "")}} name="tags_id[]" value="{{$tags->id}}" class="mr-2">{{$tags->name}}
                    </span>
                    @endforeach
                </div>
                <div class="col-md-12 col-sm-12  form-group">
                    <label for="">@lang('lang.descript_header_blog')</label>
                    <textarea class="form-control" rows="5" name="detail_header" id="">{{isset($blog_edit) ? $blog_edit->detail_header : old('detail_header') }}</textarea>
                    @if($errors->has('detail_header'))
                    <span class="text-danger">{{$errors->first('detail_header')}}</span>
                    @endif
                </div>
                <div class="col-md-12 col-sm-12  form-group">
                    <label for="">@lang('lang.descript_footer_blog')</label>
                    <textarea class="form-control" rows="5" name="detail_footer" id="">{{isset($blog_edit) ? $blog_edit->detail_footer : old('detail_footer') }}</textarea>
                    @if($errors->has('detail_footer'))
                    <span class="text-danger">{{$errors->first('detail_footer')}}</span>
                    @endif
                </div>

                <div class="ln_solid"></div>
                <div class="form-group row justify-content-center">
                    <div class="">
                        <a href="{{route('blog.index')}}"><button type="button" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.cancel')</button></a>
                        <button class="primary-btn custom-primary-btn p-2 text-white" type="reset">@lang('lang.reset')</button>
                        @if(isset($blog_edit))
                        <button type="submit" class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-update-blog">@lang('lang.update')</button>
                        @else
                        <button type="submit" class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-store-blog">@lang('lang.submit')</button>
                        @endif
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>


@endsection