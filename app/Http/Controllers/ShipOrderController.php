<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipOrderController extends Controller
{
    public function index(){
        $orders = Order::with('OrderDetail')->orderBy('updated_at','DESC')->get();
        $quantity_order_1 = Order::where('status',1)->count();
        $quantity_order_2 = Order::where('status',2)->orWhere('status', 3)->count();
        $quantity_order_3 = Order::where('status',4)->count();
        $quantity_order_4 = Order::where('status',5)->count();
        $quantity_order__1 = Order::where('status',-1)->count();
        $message = "Tất cả đơn hàng";
        $isOrder = "active";
        $isShipper = "";
        return view('ship.order.index', compact('orders','quantity_order_1', 'quantity_order_2', 'quantity_order_3', 'quantity_order_3', 'quantity_order_4', 'quantity_order__1','message','isOrder', 'isShipper'));
    }

    public function index_status($status){
        $orders = Order::with('OrderDetail')->with('Shipper')->where('status',$status)->orderBy('updated_at','DESC')->get();
        $quantity_order_1 = Order::where('status',1)->count();
        $quantity_order_2 = Order::where('status',2)->orWhere('status', 3)->count();
        $quantity_order_3 = Order::where('status',4)->count();
        $quantity_order_4 = Order::where('status',5)->count();
        $quantity_order__1 = Order::where('status',-1)->count();
        $shippers = Shipper::all();
        if($status == 1){
            $message = "Đơn hàng chờ bàn giao shipper";
        }elseif($status == 2){
            $message = "Đơn hàng đang giao";
        }elseif($status == 3){
            $message = "Đơn hàng đang giao";
        }elseif($status == 4){
            $message = "Đơn hàng đã được giao";
        }else if($status == 5){
            $message = "Đơn hàng đã hoàn tất";
        }else if($status == -1){
            $message = "Đơn hàng đã hủy";
        }
        $isOrder = "active";
        $isShipper = "";
        return view('ship.order.index', compact('shippers','isOrder', 'isShipper', 'orders','quantity_order_1', 'quantity_order_2', 'quantity_order_3','quantity_order_4', 'quantity_order__1','message','status'));
    }

    public function detail($id){
        $order = Order::with('OrderDetail')->find($id);
        $isOrder = "active";
        $isShipper = "";
        return view('ship.order.detail',compact('order','isOrder', 'isShipper'));
    }

    public function change_status($status, Request $request){
        $order = Order::find($request->id_order);
        $order->status = $status;
        $order->save();
        echo "success";
    }

    public function change_shipper(Request $request){
        $order_id = $request->id_order;
        $shipper_id = $request->shipper_id_choose;
        $order = Order::find($order_id);
        $order->shipper_id = $shipper_id;
        $order->status = 2;
        $order->save();
        return "success";
    }
}
