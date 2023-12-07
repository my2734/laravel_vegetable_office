@extends('admin.layout.master')
@section('content')
@if(session('admin.role') == 0)
<h1>@lang('lang.page_admin')</h1>
@elseif(session('admin.role') == 1)
<h1>@lang('lang.page_staff')</h1>
@else 
<h1>@lang('lang.page_shipper')</h1>
@endif
@if(session('message_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('message_success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row mb-5 text-white">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box  px-3" style="border: 1px solid #ccc; color: #333;">
            <div class="d-flex justify-content-between">
                <div class="inner">
                    <h3>{{$total_order}}</h3>
                    <p>@lang('lang.total_order')</p>
                </div>
                <div class="icon">
                    <i class="bi bi-cart"></i>
                </div>
            </div>
            <a href="{{route('order.index')}}" class="small-box-footer text-white primary-btn mb-2">@lang('lang.more_info')</i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box  px-3" style="border: 1px solid #ccc; color: #333;">
            <div class="d-flex justify-content-between">
                <div class="inner">
                    <h3>{{$total_user}}</h3>
                    <p>@lang('lang.total_user')</p>
                </div>
                <div class="icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <a href="{{route('user.index')}}" class="small-box-footer text-white primary-btn mb-2">@lang('lang.more_info')</i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box  px-3" style="border: 1px solid #ccc; color: #333;">
            <div class="d-flex justify-content-between">
                <div class="inner">
                    <h3>{{$total_product}}</h3>
                    <p>@lang('lang.total_product')</p>
                </div>
                <div class="icon">
                    <i class="bi bi-database-fill-add"></i>
                </div>
            </div>
            <a href="{{route('product.index')}}" class="small-box-footer text-white primary-btn mb-2">@lang('lang.more_info')</i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box  px-3" style="border: 1px solid #ccc; color: #333;">
            <div class="d-flex justify-content-between">
                <div class="inner">
                    <h3>{{$total_blog}}</h3>
                    <p>@lang('lang.total_blog')</p>
                </div>
                <div class="icon">
                    <i class="bi bi-card-checklist"></i>
                </div>
            </div>
            <a href="{{route('blog.index')}}" class="small-box-footer text-white primary-btn mb-2">@lang('lang.more_info')</i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="row mt-5">
    <div class="col-3">
        <div class="form-group">
            <label for="exampleInputEmail1">@lang('lang.start_date')</label>
            <input type="text" id="datepicker1" class="form-control" id="exampleInputEmail1">
            <span class="text-danger" id="datepicker1_error"></span><br>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <label for="exampleInputEmail1">@lang('lang.end_date')</label>
            <input type="text" id="datepicker2" class="form-control" id="exampleInputEmail1">
            <span class="text-danger" id="datepicker2_error"></span><br>
        </div>
    </div>
    <div class="col-6">
      <label for="exampleInputEmail1"></label><br>
      <span class="primary-btn custom-primary-btn-sort btn_thong_ke mt-1" style="cursor:pointer;">@lang('lang.statistics')</span>
    </div>
</div>
<div class="row my-3">
    <div class="col-12">
        <div class="form-group">
            <label for="exampleInputEmail1">@lang('lang.statistics_by')</label>
            <div class="form-group">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="primary-btn custom-primary-btn-sort btn_7ngaytruoc">@lang('lang.7_date_ago')</button>
                    <button type="button" class="primary-btn custom-primary-btn-sort btn_30ngaytruoc">@lang('lang.1_month_ago')</button>
                    <button type="button" class="primary-btn custom-primary-btn-sort btn_90ngaytruoc">@lang('lang.3_month_ago')</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="col-3">
      <div class="form-group">
        <label for="exampleInputEmail1">Ngày bắt đầu</label>
      </div>
    </div>
    </div> -->
<h4 class="ml-3" id="title_thong_ke"></h4>
<div class="mt-3" id="myfirstchart" style="height: 250px;"></div>
@endsection