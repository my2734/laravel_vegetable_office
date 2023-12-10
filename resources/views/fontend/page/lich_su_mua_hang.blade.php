@extends('fontend.layout.master')
@section('content')
    <div class="container">
    @if(session('message_success'))
    <div class="alert alert-success alert-dismissible mt-2 fade show text-center" role="alert">
        <strong>{{session('message_success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <h4 class="my-4 font-weight-bold" id="receive_order">@lang('lang.purchase_history')</h4>
                    <a href="{{route('checkout.lich_su_mua_hang_filter',0)}}" style="cursor:pointer; background-color: #a3b18a; color: #000;" class="ml-2 badge badge-primary">@lang('lang.order_pending_confirmation')</a>
                    <a href="{{route('checkout.lich_su_mua_hang_filter',1)}}" style="cursor:pointer;background-color: #588157; " class="ml-2 badge badge-secondary">@lang('lang.order_in_transit')</a>
                    <a href="{{route('checkout.lich_su_mua_hang_filter',4)}}" style="cursor:pointer;background-color: #3a5a40; " class="ml-2 badge badge-success">@lang('lang.order_received')</a>
                    <a href="{{route('checkout.lich_su_mua_hang_filter',-1)}}" style="cursor:pointer;background-color: #344e41; " class="ml-2 badge badge-danger">@lang('lang.order_canceled')</a>
                    <h5 class="my-3 font-weight-bold">{{ (isset($title_page)? $title_page :"") }}</h5>
                    <div class="x_content mt-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">@lang('lang.receiver')</th>
                                    <th class="text-center">@lang('lang.product_infomation')</th>
                                    <th class="text-center">@lang('lang.shipping_address')</th>
                                    <th class="text-center">@lang('lang.order_date')</th>
                                    <th class="text-center">@lang('lang.order_payment')</th>
                                    <th class="text-center">@lang('lang.status_order')</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    
                                    <th scope="row">{{($key+1)}} </th>
                                    <td>{{$order->full_name}}</td>
                                    <td>
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
                                                <img height="50" width="50" src="{{asset('Uploads/'.$order_detail->pro_image)}}" alt="">
                                                <span class="float-right text-secondary">{{number_format($order_detail->pro_price)}}vnđ x {{$order_detail->pro_quantity}}</span>
                                            </span><br>
                                            @endforeach
                                        @else
                                            @foreach($order->OrderDetail as $order_detail)
                                            @php
                                                $totalDetail += $order_detail->pro_price*$order_detail->pro_quantity;
                                            @endphp
                                            <span>
                                                <span>{{$order_detail->pro_name}}</span>
                                            </span><br>
                                            <span>
                                                <img height="50" width="50" src="{{asset('Uploads/'.$order_detail->pro_image)}}" alt="">
                                                <span class="float-right text-secondary">{{number_format($order_detail->pro_price)}}vnđ x {{$order_detail->pro_quantity}}</span>
                                            </span><br>
                                            @endforeach
                                        @endif
                                        <p class="font-weight-bold mt-3">@lang('lang.payment') <span class="float-right ">{{number_format(isset($order->total) ? $order->total : $orderDetail )}}vnđ</span></p>
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
                                            <div class="col-md-6">@lang('lang.address_detail')</div>
                                            <div class="col-md-6"> {{$order->address_detail}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">@lang('lang.phone')</div>
                                            <div class="col-md-6"> {{$order->phone}}</div>
                                        </div>
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        @if($order->payment_type==1)
                                        <p>@lang('lang.payment_has_been_processed')</p>
                                        @else
                                        <p>@lang('lang.pay_delivery')</p>
                                        @endif
                                    </td>
                                    <td>
                                       

                                        @if($order->status==0) @lang('lang.pending_confirmation') <br><button data-toggle="modal" data-target="#delete_order<?php echo $order->id ?>" class="btn btn-sm primary-btn custom-primary-btn custom-primary-btn-cancel">@lang('lang.cancel_order')</button>
                                        @elseif($order->status == 3) <button id="{{$order->id}}" class="btn btn-sm primary-btn custom-primary-btn receive_order">@lang('lang.receive_the_delivery')</button>
                                        @elseif($order->status == 4) @lang('lang.received_the_delivery')
                                        @elseif($order->status == -1) @lang('lang.canceled')
                                            <br>
                                            <h5>@lang('lang.reason'):</h5>
                                            <p>{{ $order->reason }}</p>
                                        @else @lang('lang.in_transit')
                                        @endif

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_order<?php echo $order->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('checkout.detroy_order',$order->id)}}" method="POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">@lang('lang.are_cancel_order')</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>@lang('lang.cancellation_reason'):</label>
                                                            <input type="text" name="reason" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm primary-btn custom-primary-btn" data-dismiss="modal">@lang('lang.close')</button>
                                                            <button type="submit" class="btn btn-sm primary-btn custom-primary-btn custom-primary-btn-cancel">@lang('lang.sure')</a>
                                                        </div>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       <div class="my-3 float-right">
                       {{$orders->links('vendor.pagination.custom')}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
