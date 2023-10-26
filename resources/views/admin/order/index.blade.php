@extends('admin.layout.master')
@section('content')
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="font-weight-bold">Danh sách đơn hàng</h2>
            <?php
                $class_cho_xac_nhan = "";
                $class_dang_giao = "";
                $class_da_giao = "";
                $class_da_huy = "";
                if(isset($status)){
                    if($status == 0){
                    $class_cho_xac_nhan = "btn-order-active";
                }elseif($status == 1){
                    $class_dang_giao = "btn-order-active";
                }elseif($status == 2){
                    $class_da_giao = "btn-order-active";
                }elseif($status == -1){
                    $class_da_huy = "btn-order-active";
                }
                }
            ?>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="{{route('order.filter_status',0)}}"><button  class="primary-btn custom-primary-btn {{$class_cho_xac_nhan}}">Đơn hàng chờ xác nhận</button></a>
                </li>
                <li class="dropdown ml-auto">
                    
                    <a href="{{route('order.filter_status',1)}}"><button  class="primary-btn custom-primary-btn {{$class_dang_giao}}">Đơn hàng đang giao</button></a>
                    
                    <!-- <a class="btn btn-sm btn-danger">Đơn hàng đang giao</a>
                    <a class="btn btn-sm btn-success">Đơn hàng đã giao</a> -->
                </li>
                <li><a href="{{route('order.filter_status',2)}}"><button  class="primary-btn custom-primary-btn {{$class_da_giao}}">Đơn hàng đã giao</button></a>
                </li>
                <li><a href="{{route('order.filter_status',-1)}}"><button  class="primary-btn custom-primary-btn {{$class_da_huy}}">Đơn hàng đã hủy</button></a>
                </li>
            </ul>
           
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <h5>{{isset($message) ? $message : ""}}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
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
                        <td scope="row">{{$order->id}}</td>
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
                            <p class="font-weight-bold mt-3">Thanh toán <span class="ml-5">{{number_format($order->total)}}vnđ</span></p>
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
                            @if($order->status==0) <button id="{{$order->id}}" class="primary-btn custom-primary-btn btn_change_status">Xác nhận</button>
                            @elseif($order->status == -1)
                                <p>Đã hủy</p>
                                <h6>Lí do:</h6>
                                <p>{{ $order->reason }}</p>
                            @elseif($order->status == 5) <p>Đã nhận hàng</p>
                            @else <p>Đang giao hàng</p>
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
