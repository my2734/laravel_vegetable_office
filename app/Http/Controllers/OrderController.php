<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('OrderDetail')->orderBy('updated_at','DESC')->paginate(4);
        return view('admin.order.index',compact('orders'));
    }

    public function change_status(Request $request){
        $order_id = $request->order_id;
        $order = Order::find($order_id);
        $order->status = 1;
        $order->save();
    }
}
