@extends('ship.layout.master')
@section('content')
<div class="content">
    <div class="container">
        <div>{{$order->status}}</div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <?php
                    if(isset($order) && $order->status == 1){
                    ?>
                        <img id="image_progress_bar" height="120" src="{{asset('Uploads/progress_bar0.jpg')}}" alt="">
                    <?php
                    }else if(isset($order) && ($order->status == 2 || $order->status == 3 )){ ?>
                        <img id="image_progress_bar" height="120" src="{{asset('Uploads/progress_bar1.jpg')}}" alt="">
                    
                    <?php
                    }else if(isset($order) && $order->status == 4){ ?>
                        <img id="image_progress_bar" height="120" src="{{asset('Uploads/progress_bar2.jpg')}}" alt="">
                    <?php 
                    }else if(isset($order) && $order->status == -1){ ?>
                        <img id="image_progress_bar" height="120" src="{{asset('Uploads/progress_bar_1.jpg')}}" alt="">
                    <?php 
                    }else{ ?>
                        <img class="image_progress_bar"  height="120" src="{{asset('Uploads/progress_bar3.jpg')}}" alt="">
                    <?php
                    } 
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Chi tiết đơn hàng</h4>
                        <button id="btnShipReceive" id-order={{$order->id}} class="btn btn-primary @if((isset($order) && isset($order->status)) && ($order->status!=2)) btn_disable @endif" style="width: auto">Xác nhận giao hàng</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Người đặt hàng
                                        </th>
                                        <th>
                                            Thông tin sản phẩm
                                        </th>
                                        <th width="200">
                                            Địa chỉ đặt hàng
                                        </th>
                                        <th class="text-right">
                                            Người giao hàng
                                        </th>
                                        <th class="text-right">
                                            Ngày đặt hàng
                                        </th>
                                        <th class="text-right">
                                            Ngày nhận hàng dự kiến
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: top;">
                                            {{$order->full_name}}
                                        </td>
                                        
                                        <td style="width: 200px;" style="vertical-align: top;">
                                            @if(isset($order->OrderDetail))
                                            @foreach ($order->OrderDetail as $order_detail)
                                            <span>
                                                <span>{{$order_detail->pro_name}}</span>
                                            </span>
                                            <br>
                                            <span>
                                                <img height="40" width="40" src="{{asset('Uploads/'.$order_detail->pro_image)}}" alt="">
                                                <span class="text-secondary float-right">{{number_format($order_detail->pro_price)}}vnđ x {{$order_detail->pro_quantity}}</span>
                                            </span>
                                            <br>
                                            @endforeach
                                            @endif
                                            <p class="font-weight-bold mt-3">Tổng <span class="ml-5">{{$order->total}}vnđ</span></p>
                                            <p class="font-weight-bold mt-3">Ship <span class="ml-5">30.000vnđ</span></p>
                                            <p class="font-weight-bold mt-3">Thanh toán <span class="ml-5">{{number_format($order->total+30000)}}vnđ</span></p>
                                        </td>
                                        <td style="vertical-align: top;">
                                            <div class="row m-0 p-0">
                                                <div class="col-6 m-0 p-0">Quốc gia</div>
                                                <div class="col-6 m-0 p-0">{{$order->country}}</div>
                                                <div class="col-6 m-0 p-0">Tỉnh/Thành phố</div>
                                                <div class="col-6 m-0 p-0">{{$order->conscious}}</div>
                                                <div class="col-6 m-0 p-0">Quận/Huyện</div>
                                                <div class="col-6 m-0 p-0">{{$order->district}}</div>
                                                <div class="col-6 m-0 p-0">Địa chỉ chi tiết</div>
                                                <div class="col-6 m-0 p-0">{{$order->address_detail}}</div>
                                            </div>
                                        </td>
                                        <td class="text-right" style="vertical-align: top;">
                                            Trịnh Thăng Bằng
                                        </td>
                                        <td class="text-right" style="vertical-align: top;">
                                            {{date('Y-m-d', strtotime($order->created_at))}}
                                        </td>
                                        <td class="text-right" style="vertical-align: top;">
                                            {{date('Y-m-d', strtotime('+5 day',strtotime($order->created_at)))}}
                                            <br />
                                            @if(isset($order) && isset($order->status) && $order->status==-1)
                                            <span style="font-size: 12px; color: #EF8157">Lí do: {{$order->reason}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection