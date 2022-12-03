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
                   <h4 class="my-4 font-weight-bold" id="receive_order">Lịch sử mua hàng</h4>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Người nhận hàng</th>
                                    <th class="text-center">Thông tin sản phẩm</th>
                                    <th class="text-center">Địa chỉ giao hàng</th>
                                    <th class="text-center">Ngày đặt hàng</th>
                                    <th class="text-center">Tình trạng đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    <th scope="row">{{($key+1)}}</th>
                                    <td>{{$order->full_name}}</td>
                                    <td>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($order->OrderDetail as $order_detail)
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
                                        <p class="font-weight-bold mt-3">Thanh toán <span class="float-right ">{{number_format($total)}}vnđ</span></p>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">Quốc gia</div>
                                            <div class="col-md-6">{{$order->country}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Tỉnh/Thành phố</div>
                                            <div class="col-md-6">{{$order->conscious}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Quận/Huyện</div>
                                            <div class="col-md-6">{{$order->district}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> Địa chỉ chi tiết</div>
                                            <div class="col-md-6"> {{$order->address_detail}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">Số điện thoại</div>
                                            <div class="col-md-6"> {{$order->phone}}</div>
                                        </div>
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        @if($order->status==0) Chờ xác nhận <br><a href="{{route('checkout.detroy_order',$order->id)}}" class="btn btn-sm btn-danger text-white">Hủy đơn hàng</a>
                                        @elseif($order->status==1) <button id="{{$order->id}}" class="btn btn-sm btn-primary receive_order">Nhận hàng</button>
                                        @else Đã nhận hàng
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
