<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Mail;
use Illuminate\Http\Request;
use Cart;
use Carbon\Carbon;
use Auth;
class CheckoutController extends Controller
{
    public function checkout_show(){
        $categories = Category::where('status',1)->get();
        $carts = Cart::content();
        $sub_total = Cart::subtotal();
        $user_buy = User::find(Auth::user()->id);
        // echo json_encode($user_buy);
        return view('fontend.page.checkout',compact('categories','carts','sub_total','user_buy'));
    }

    public function add_order(Request $request){
        $request->validate([
            'full_name'        => 'required',
            'country'           => 'required',
            'conscious'          => 'required',
            'district'          => 'required',
            'phone'             => 'required',
            'email'             => 'required'
        ],[
            'full_name.required'        => 'Vui lòng nhập First Name',
            'country.required'           => 'Vui lòng nhập tên quốc gia',
            'conscious.required'          => 'Vui lòng nhập tên tỉnh/thành phố',
            'district.required'          => 'Vui lòng nhập tên quận/huyện',
            'phone.required'             => 'Vui lòng nhập số điện thoại',
            'email.required'             => 'Vui lòng nhập Email'
        ]);


        // Insert tbl_order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->full_name = $request->full_name;
        $order->country = $request->country;
        $order->conscious = $request->conscious;
        $order->district = $request->district;
        $order->address_detail = $request->address_detail;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->order_note = $request->order_note;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->save();
        // Insert tbl_order_detail

        $carts = Cart::content();
        foreach($carts as $cart){
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->user_id = Auth::user()->id;
            $order_detail->pro_id = $cart->id;
            $order_detail->pro_name = $cart->name;
            $order_detail->pro_image = $cart->options['image'];
            $order_detail->pro_price = $cart->price;
            $order_detail->pro_quantity = $cart->qty;
            $order_detail->created_at = Carbon::now();
            $order_detail->updated_at = Carbon::now();
            $order_detail->save();
        }

        // return response()->json(Cart::content());
        // echo "hello";
        // die();
        // echo json_encode($order_detail);
        // die();

        //Gui mail 
        $name = 'Chúc mừng bạn đã đặt hàng thành công';
        $user = User::find($order->user_id);


        Mail::send('emails.order',compact('name'),function($email) use ($user) {
            $email->subject("Xác nhận đơn hàng");
            $email->to($user->email,$user->user_name);
        });
        Cart::destroy();
        return redirect()->route('checkout.lich_su_mua_hang')->with('order_success','Đặt hàng thành công, Vui lòng kiểm tra lại Email!');

        // echo "hello";
    }

    public function lich_su_mua_hang(){
        $categories = Category::where('status',1)->get();
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id',$user_id)->with('OrderDetail')->orderBy('id','DESC')->get();
        // return response()->json($orders);
        return view('fontend.page.lich_su_mua_hang',compact('categories','orders'));
    }

    public function receive_order(Request $request){
        $order_id = $request->order_id;
        $order = Order::find($order_id);
        $order->status = 2;
        $order->save();
    }

    public function detroy_order(Request $request){
        $order_id = $request->id;
        //delete order_dtail
        OrderDetail::where('order_id',$order_id)->delete();
        //delete order
        Order::find($order_id)->delete();
        return redirect()->back()->with('message_success','Xóa đơn hàng thành công');
    }
}
