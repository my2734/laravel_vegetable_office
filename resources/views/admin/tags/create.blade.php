@extends('admin.layout.master')
@section('content')
<div class="title-left">
    @if(isset($tags_edit))
    <h2>@lang('lang.update_tags')</h2>
    @else
    <h2>@lang('lang.create_tags')</h2>
    @endif
</div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            @if(isset($tags_edit))
            <h2>@lang('lang.update_tags')</h2>
            @else
            <h2>@lang('lang.create_tags')</h2>
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

            <form action="{{isset($tags_edit) ? route('tags.update',$tags_edit->id) : route('tags.store')}}" method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12  form-group">
                    <input type="text" class="form-control" value="{{isset($tags_edit) ? $tags_edit->name : old('name') }}" name="name" id="inputSuccess2" placeholder="Tên Tags">
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="col-md-12 col-sm-12  form-group">
                    <div class="checkbox">
                        <h4>
                            <input type="checkbox" {{isset($tags_edit) ? "checked" : "" }} name="status" value="1" class="mr-3">@lang('lang.status')
                        </h4>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group row justify-content-center">
                    <a href="{{route('tags.index')}}"><button type="button" class="btn btn-primary">@lang('lang.cancel')</button></a>
                    <button class="btn btn-primary" type="reset">@lang('lang.reset')</button>
                    <button type="submit" class="btn btn-success btn-store-tags">@lang('lang.submit')</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection