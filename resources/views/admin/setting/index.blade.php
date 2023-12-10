@extends('admin.layout.master')
@section('content')
<div class="container" height="500">
    <div class="mb-3">
        <h3 class="h3">@lang('lang.main_background')</h3>
        <div class="d-flex">
            <?php
            $id = "12";
            ?>
            <a href="{{route('setting.update_background_main','363062')}}" data-color="#363062" class="primary-btn custom-primary-btn-sort btn_custom_pattern mr-3"></a>
            <a href="{{route('setting.update_background_main','557C55')}}" data-color="#557C55" class="primary-btn custom-primary-btn-sort btn_custom_pattern mr-3"></a>
            <a href="{{route('setting.update_background_main','6B240C')}}" data-color="#6B240C" class="primary-btn custom-primary-btn-sort btn_custom_pattern mr-3"></a>
            <a href="{{route('setting.update_background_main','FFD28F')}}" data-color="#FFD28F" class="primary-btn custom-primary-btn-sort btn_custom_pattern mr-3"></a>
            <a href="{{route('setting.update_background_main','2D9596')}}" data-color="#2D9596" class="primary-btn custom-primary-btn-sort btn_custom_pattern mr-3"></a>
            <a href="{{route('setting.update_background_main','2a3f54')}}" data-color="#2a3f54" class="primary-btn custom-primary-btn-sort btn_custom_pattern mr-3"></a>

        </div>
    </div>
    <div class="mt-5">
        <h3>@lang('lang.percent_profit_order')</h3>
        <form method="POST" action="{{route('setting.update_percent_setting')}}">
            <input name="percent_profit" class="form-control" value="{{session('setting.profit_order')}}" />
            <button class="primary-btn custom-primary-btn-sort mt-3">@lang('lang.update')</button>
            @csrf
        </form>
    </div>
    <div class="mt-5">
        <h3>@lang('site_name')</h3>
        <form method="POST" action="{{route('setting.update_name_site_setting')}}">
            <input name="name_site" class="form-control" value="{{session('setting.name_site')}}" />
            <button class="primary-btn custom-primary-btn-sort mt-3">@lang('lang.update')</button>
            @csrf
        </form>
    </div>
</div>
@endsection