@extends('admin.layout.master')
@section('content')
<div class="title-left">
    <h2>Tạo mới nhân viên</h2>
</div>
<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
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
            <form action="{{route('manager_human.store')}}" method="POST" class="form-label-left input_mask" enctype="multipart/form-data">
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <input type="text" class="form-control" value="" name="name" id="inputSuccess2" placeholder="Tên người dùng">
                </div>
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <input type="text" class="form-control" value="" name="email" id="inputSuccess2" placeholder="Email">
                </div>
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <input type="text" class="form-control" value="" name="phone" id="inputSuccess2" placeholder="Số điện thoại">
                </div>
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <select class="select2_single form-control" name="cat_id" tabindex="-1">
                        <option value="0">Administrator</option>
                        <option value="1">Staff</option>
                        <option value="2">Shipper</option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <input type="password" class="form-control" value="" name="password" id="inputSuccess2" placeholder="Mật khẩu">
                </div>
                <div class="col-md-6 col-sm-6 mt-4 form-group">
                    <input type="password" class="form-control" value="" name="confirm_password" id="inputSuccess2" placeholder="Xác nhận mật khẩu">
                </div>
                <div class="ln_solid"></div>
                <div class="col-md-12 mt-4">
                <div class="form-group row justify-content-center">
                    <div class="">
                        <a href="{{route('blog.index')}}"><button type="button" class="primary-btn custom-primary-btn p-2 text-white">@lang('lang.cancel')</button></a>
                        <button class="primary-btn custom-primary-btn p-2 text-white" type="reset">@lang('lang.reset')</button>
                        <button type="submit" class="primary-btn custom-primary-btn p-2 text-white btn-submit-store-form btn-store-human">@lang('lang.create_new')</button>
                    </div>
                </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection