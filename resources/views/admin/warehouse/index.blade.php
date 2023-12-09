@extends('admin.layout.master')

@section('content')
<div class="title_left">

    <h3>@lang('lang.warehouse')</h3>
</div>
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <form method="POST" action="{{route('warehouse.search_product')}}">
                        <div class="input-group d-flex align-items-center">
                            <input type="text" name="search_key" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button type="submit" class="primary-btn custom-primary-btn p-2 text-white ml-1 m-0 btn-search-warehouse" type="button">@lang('lang.search')</button>
                            </span>
                        </div>
                        @csrf
                    </form>
                </div>
                <div class="col-3">
                    <a href="{{route('warehouse.filter_sold_out')}}" class="primary-btn custom-primary-btn p-2 text-white ml-1 mt-1">Hết hàng</a>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('lang.image')</th>
                        <th>@lang('lang.product_id')</th>
                        <th>@lang('lang.name')</th>
                        <th>@lang('lang.import_quantity')</th>
                        <th>@lang('lang.export_quantity')</th>
                        <th>@lang('lang.stock')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <?php
                    if (isset($status_display_sold_out) && $status_display_sold_out == true) {
                        if (((int)$product->warehouse->export_quantity - (int)$product->warehouse->import_quantity) >= 0) { 
                            ?>
                            <tr>
                                <th>{{($key+1)}} <h1>{{((int)$product->warehouse->export_quantity - (int)$product->warehouse->import_quantity)}}</h1></th>
                                <td width="60px">
                                    <img height="50px;" width="50px;" class="mt-1" src="{{asset('Uploads/'.$product->product_image[0]->image)}}" alt="">
                                </td>
                                <td>{{$product->id}}</td>
                                <td><a href="{{route('product.edit',$product->id)}}">{{$product->name}}</a></td>
                                <td>{{$product->warehouse->import_quantity}}</td>
                                <td>{{$product->warehouse->export_quantity}}</td>
                                <td>{{ ($product->warehouse->import_quantity - $product->warehouse->export_quantity) }}
                                <td>
                            </tr>
                        <?php }
                    } else {
                        ?>
                        <tr>
                            <th>{{($key+1)}}</th>
                            <td width="60px">
                                <img height="50px;" width="50px;" class="mt-1" src="{{asset('Uploads/'.$product->product_image[0]->image)}}" alt="">
                            </td>
                            <td>{{$product->id}}</td>
                            <td><a href="{{route('product.edit',$product->id)}}">{{$product->name}}</a></td>
                            <td>{{$product->warehouse->import_quantity}}</td>
                            <td>{{$product->warehouse->export_quantity}}</td>
                            <td>{{ ($product->warehouse->import_quantity - $product->warehouse->export_quantity) }}
                            <td>
                        </tr>
                    <?php   }
                    ?>

                    @endforeach
                </tbody>
            </table>
            @if(!isset($status_display_sold_out))
            <div class="float-right">
                {{$products->links('vendor.pagination.custom')}}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection