<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use PDF;
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

    public function print_pdf($order_id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($order_id),'UTF-8');
        // $dompdf->load_html($html, 'UTF-8');
        $pdf->set_paper('A4');
        $pdf->render();
        return $pdf->stream();
    }

    public function print_order_convert($order_id){
        $order = Order::find($order_id);
        $list_order_detail = OrderDetail::where('order_id',$order_id)->get();
        $total = 0;
        foreach($list_order_detail as $order_detail){
            $total+=$order_detail->pro_price*$order_detail->pro_quantity;
        }
        return view('admin.order.pdf',compact('order','list_order_detail','total'));
    }
}
