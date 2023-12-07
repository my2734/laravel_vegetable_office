@extends('admin.layout.master')
@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="font-weight-bold">@lang('lang.list_order')</h2>
            <?php
            $class_cho_xac_nhan = "";
            $class_dang_giao = "";
            $class_da_giao = "";
            $class_da_huy = "";
            if (isset($status)) {
                if ($status == 0) {
                    $class_cho_xac_nhan = "btn-order-active";
                } elseif ($status == 1 || $status == 2 || $status == 3) {
                    $class_dang_giao = "btn-order-active";
                } elseif ($status == 4) {
                    $class_da_giao = "btn-order-active";
                } elseif ($status == -1) {
                    $class_da_huy = "btn-order-active";
                }
            }
            ?>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{route('order.filter_status',0)}}"><button class="primary-btn custom-primary-btn {{$class_cho_xac_nhan}}">
                           @lang('lang.order_pending_confirmation')
                        </button></a>
                </li>
                <li class="dropdown ml-auto">
                    <a href="{{route('order.filter_status',1)}}"><button class="primary-btn custom-primary-btn {{$class_dang_giao}}">
                            @lang('lang.order_in_transit')
                        </button></a>
                </li>
                <li>
                    <a href="{{route('order.filter_status',4)}}">
                        <button class="primary-btn custom-primary-btn {{$class_da_giao}}">
                            @lang('lang.order_has_been_delivered')
                        </button>
                    </a>
                </li>
                <li>
                    <a href="{{route('order.filter_status',-1)}}">
                        <button class="primary-btn custom-primary-btn {{$class_da_huy}}">
                            @lang('lang.order_canceled')
                        </button>
                    </a>
                </li>
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <h5>{{isset($message) ? $message : ""}}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>@lang('lang.order_id')</th>
                        <th class="text-center">@lang('lang.receiver')</th>
                        <th class="text-center">@lang('lang.product_infomation')</th>
                        <th class="text-center">@lang('lang.shipping_address')</th>
                        <th class="text-center">@lang('lang.order_date')</th>
                        <th class="text-center">@lang('lang.payment_method')</th>
                        <th class="text-center">@lang('lang.status_order')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <td scope="row">{{$order->id}}</td>
                        <td>{{$order->full_name}} <br>
                            <a class="badge badge-secondary" href="{{route('order.print_pdf',$order->id)}}"><i class="fa fa-print" aria-hidden="true"></i> @lang('lang.print_invoice')<a>
                        </td>
                        <td style="width: 200px;">
                            @php
                            $total = 0;
                            @endphp
                            @if(gettype(json_decode($order->order_db)) == 'array')
                            @foreach(json_decode($order->order_db) as $order_detail)
                            @php
                            $total += $order_detail->pro_price*$order_detail->pro_quantity;
                            @endphp
                            <span>
                                <span>{{$order_detail->pro_name}}</span>
                            </span><br>
                            <span>
                                <img height="40" width="40" src="{{asset('Uploads/'.$order_detail->pro_image)}}" alt="">
                                <span class="text-secondary float-right">{{number_format($order_detail->pro_price)}}vnđ x {{$order_detail->pro_quantity}}</span>
                            </span><br>
                            @endforeach
                            @else
                            @foreach($order->OrderDetail as $order_detail)
                            @php
                            $total += $order_detail->pro_price*$order_detail->pro_quantity;
                            @endphp
                            <span>
                                <span>{{$order_detail->pro_name}}</span>
                            </span><br>
                            <span>
                                <img height="40" width="40" src="{{asset('Uploads/'.$order_detail->pro_image)}}" alt="">
                                <span class="text-secondary float-right">{{number_format($order_detail->pro_price)}}vnđ x {{$order_detail->pro_quantity}}</span>
                            </span><br>
                            @endforeach
                            @endif
                            <p class="font-weight-bold mt-3">Thanh toán <span class="ml-5">{{number_format($order->total)}}vnđ</span></p>
                        </td>

                        <td>
                            <div class="row">
                                <div class="col-md-6">@lang('lang.country')</div>
                                <div class="col-md-6">{{$order->country}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">@lang('lang.city')</div>
                                <div class="col-md-6">{{$order->conscious}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">@lang('lang.district')</div>
                                <div class="col-md-6">{{$order->district}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> @lang('lang.address_detail')</div>
                                <div class="col-md-6"> {{$order->address_detail}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">@lang('lang.phone')</div>
                                <div class="col-md-6"> {{$order->phone}}</div>
                            </div>
                        </td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            @if($order->payment_type == 1)
                            @lang('lang.payment_has_been_processed')
                            @else 
                            @lang('lang.pay_delivery')
                            @endif
                        </td>
                        <td>
                            @if($order->status==0)
                            <button id="{{$order->id}}" class="primary-btn custom-primary-btn btn_change_status">@lang('lang.confirm')</button>
                            @elseif($order->status == -1)
                            <p>@lang('lang.order_canceled')</p>
                            <h6>@lang('lang.reason'):</h6>
                            <p>{{ $order->reason }}</p>
                            @elseif($order->status == 4) <p>@lang('lang.received_the_delivery')</p>
                            @else <p>@lang('lang.in_transit')</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$orders->links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
</div>
@endsection