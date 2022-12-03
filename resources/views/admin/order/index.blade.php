@extends('admin.layout.master')
@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="font-weight-bold">Danh sách đơn hàng</h2>
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
                        <td>{{$order->full_name}} <br>
                            <a class="badge badge-secondary" href="{{route('order.print_pdf',$order->id)}}" ><i class="fa fa-print" aria-hidden="true"></i> In hóa đơn<a>
                        </td>
                        <td style="width: 200px;">
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
                                <img height="40" width="40" src="{{asset('Uploads/'.$order_detail->pro_image)}}" alt="">
                                <span class="text-secondary float-right">{{number_format($order_detail->pro_price)}}vnđ x {{$order_detail->pro_quantity}}</span>
                            </span><br>
                            @endforeach
                            <p class="font-weight-bold mt-3">Thanh toán <span class="ml-5">{{number_format($total)}}vnđ</span></p>
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
                            @if($order->status==0) <button id="{{$order->id}}" class="btn btn-primary btn-sm btn_change_status">Xác nhận</button>
                            @elseif($order->status == 1) <p>Đang giao hàng</p>
                            @else <p>Đã nhận hàng</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                    {{$orders->links()}}
                </div>
        </div>
    </div>
</div>
@endsection
