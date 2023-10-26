@extends('ship.layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{route('ship.order.list',1)}}" class="card card-stats text-decoration-none">
                <div class="card-body {{isset($status)&&($status==1)?'list-order-active':''}}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers text-left">
                                <p class="card-category">Chờ bàn giao</p>
                                <p class="card-title">{{isset($quantity_order_1)?$quantity_order_1:""}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{route('ship.order.list',2)}}" class="card card-stats text-decoration-none">
                <div class="card-body {{isset($status)&&($status==2)?'list-order-active':''}}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers text-left">
                                <p class="card-category">Đang giao</p>
                                <p class="card-title">{{isset($quantity_order_2)?$quantity_order_2:""}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{route('ship.order.list',4)}}" class="card card-stats text-decoration-none">
                <div class="card-body {{isset($status)&&($status==4)?'list-order-active':''}}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers text-left">
                                <p class="card-category">Đã giao hàng</p>
                                <p class="card-title">{{isset($quantity_order_3)?$quantity_order_3:""}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{route('ship.order.list',5)}}" class="card card-stats text-decoration-none">
                <div class="card-body {{isset($status)&&($status==5)?'list-order-active':''}}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers text-left">
                                <p class="card-category">Hoàn tất</p>
                                <p class="card-title">{{isset($quantity_order_4)?$quantity_order_4:""}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="{{route('ship.order.list',-1)}}" class="card card-stats text-decoration-none">
                <div class="card-body {{isset($status)&&($status==-1)?'list-order-active':''}}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="numbers text-left">
                                <p class="card-category">Hủy đơn</p>
                                <p class="card-title">{{isset($quantity_order__1)?$quantity_order__1:""}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{isset($message)?$message:""}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Mã đơn</th>
                                <th> Bên nhận</th>
                                <th class="text-right">
                                    Tổng hóa đơn
                                </th>
                                @if(isset($status) && ($status==0 || $status == 1 || $status == 2))
                                <th>Người giao hàng</th>
                                @endif
                                <th class="">
                                    Trạng thái
                                </th>
                                <th class="text-center">
                                    Quản lý
                                </th>
                            </thead>
                            <tbody>
                                @if($orders)
                               
                                @foreach($orders as $key => $order)
                                <tr>
                                    
                                    <td>
                                        {{$order->id}}
                                    </td>
                                    <td>
                                       {{$order->full_name}}
                                       <br />
                                       <span style="color: #FE8157; font-size: 12px">{{$order->phone}} - {{$order->conscious}}</span>
                                    </td>
                                    <td class="text-right">
                                        <span style="font-size: 12px">{{number_format($order->total)}} vnđ</span>
                                        <br />
                                       <span style="color: #FE8157; font-size: 12px">ship: 30,000 vnđ</span>
                                        <br />
                                        Tổng: {{number_format(($order->total+30000))}} vnđ
                                    </td>
                                    @if(isset($status) && $status==1)
                                    <td>
                                        <select class="form-select choose_shipper{{$order->id}}" aria-label="Default select example">
                                            <option value="null">Chọn người giao</option>
                                            @if(isset($shippers))
                                            @foreach($shippers as $shipper)
                                            <option {{isset($order->shipper_id) && $order->shipper_id == $shipper->id?"selected":""}} value="{{$shipper->id}}">{{$shipper->name}}</option>
                                            @endforeach
                                            @endif
                                          </select>
                                        <br/> <button id="{{$order->id}}" class="choose_shipper_button badge badge-success">Update</button></td>
                                    @elseif(isset($status) && ($status == 2 || $status == 3 || $status == 4 || $status == 5))     
                                        <td>{{isset($order->shipper)?$order->shipper->name:"Chưa có thông tin"}}</td>
                                    @endif
                                    <td class="">
                                        <?php 
                                            if($order->payment_type == 0) {
                                                echo "COD";
                                            }else{
                                                echo "Đã thanh toán";
                                            }
                                        ?> - <?php 
                                            if($order->status == 1){
                                                echo "Chờ xác nhận shipper";
                                            }else if($order->status == 2 || $order->status == 3){
                                                echo "Đang giao";
                                            }else if($order->status == 4){
                                                echo "Đã giao hàng";
                                            }else if($order->status == 5){
                                                echo "Hoàn tất";
                                            }else{
                                                echo "Hủy đơn";
                                                ?>
                                                <br />
                                                {{isset($order->reason)?$order->reason:""}}
                                                <?php
                                            }
                                            
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{route('ship.order_detail', $order->id)}}">
                                            <button class="btn-round">Xem chi tiết</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection