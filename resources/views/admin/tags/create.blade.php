@extends('admin.layout.master')
@section('content')
    <div class="title-left">
        <h2>{{isset($tags_edit) ? "Chỉnh sửa Tags" : "Tạo mới Tags"}}</h2>
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{isset($tags_edit) ? "Update Tags" :  "Create Tags"}}</h2>
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
                
                <form action="{{isset($tags_edit) ? route('tags.update',$tags_edit->id) : route('tags.store')}}"  method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12  form-group">
                        <input type="text" class="form-control" value="{{isset($tags_edit) ? $tags_edit->name : old('name') }}" name="name" id="inputSuccess2" placeholder="Tên Tags">
                        @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="col-md-12 col-sm-12  form-group">
                        <div class="checkbox">
                            <h4>
                                <input type="checkbox" {{isset($tags_edit) ? "checked" : "" }}  name="status" value="1" class="mr-3">Trạng thái
                            </h4>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <a href=""><button type="button" class="btn btn-primary">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Sumit</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection