<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\News;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('OrderDetail')->orderBy('updated_at','DESC')->paginate(4);
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.order.index',compact('orders','news','total_news'));
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
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.order.pdf',compact('order','list_order_detail','total','news','total_news'));
    }

    public function filter_by_status($status){
        $orders = Order::where('status',$status)->with('OrderDetail')->orderBy('updated_at','DESC')->paginate(4);
        if($status == 0){
            $message = "Đơn hàng chờ xác nhận";
        }elseif($status == 1){
            $message = "Đơn hàng đang giao";
        }elseif($status == 2){
            $message = "Đơn hàng đã giao thành công";
        }else{
            $message = "Đơn hàng đã hủy";
        }
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.order.index',compact('orders','news','total_news','status'))->with('message',$message);
    }

}
