<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\User_Info;
use App\Models\Statistic;
use App\Models\Warehouse;
use App\Models\Wish_List;
use App\Models\News;
use App\Models\Setting;
use Mail;
use Illuminate\Http\Request;
use Cart;
use Carbon\Carbon;
// use Auth;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout_show()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $carts = Cart::content();
        $sub_total = Cart::subtotal();
        $user_buy = User_Info::where('user_id', $user->id)->first();
        // echo json_encode($user_buy);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }

        $status_checkout = true;
        foreach ($carts as $cart) {
            if ($cart->qty <= 0) $status_checkout = false;
        }
        if (!$status_checkout) {
            return redirect()->back();
        } else {
            return view('fontend.page.checkout', compact('categories', 'carts', 'sub_total', 'user_buy', 'count_wish_list'));
        }
    }

    public function payment_vnpay()
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8001/checkout";
        $vnp_TmnCode = "URHY337Q"; //Mã website tại VNPAY 
        $vnp_HashSecret = "ZWJHOFQYTBYRPFLFZXIPCGSYPKINECAE"; //Chuỗi bí mật

        $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan demo';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo


    }


    public function payment_momo()
    {

        header('Content-type: text/html; charset=utf-8');
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(
                $ch,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                )
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
        }



        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "captureWallet";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        $result = execPostRequest($endpoint, json_encode($data));

        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there

        header('Location: ' . $jsonResult['payUrl']);
        // echo "thanh toan mômp";
        // return redirect()->back();
    }

    public function add_order(Request $request)
    {


        $request->validate([
            'full_name'        => 'required',
            'country'           => 'required',
            'conscious'          => 'required',
            'district'          => 'required',
            'phone'             => 'required',
            'email'             => 'required'
        ], [
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
        if ($request->method_payment != 'offline') {
            $order->payment_type = 1;
        }
        $order->save();

        // Insert tbl_order_detail
        $carts = Cart::content();
        Cart::destroy();
        // echo json_encode($carts);
        // die();
        $total = 0;
        $quantity_of_cart = 0;

        $order_data = [];
        foreach ($carts as $cart) {
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
            $total += $order_detail->pro_price * $order_detail->pro_quantity;
            $quantity_of_cart +=  $order_detail->pro_quantity;

            //update kho hang
            $warehouse_item = Warehouse::where('product_id', $cart->id)->first();
            $warehouse_item->export_quantity = $warehouse_item->export_quantity + $order_detail->pro_quantity;
            $warehouse_item->save();

            //update total tbl_order
            $order_update = Order::find($order->id);
            $order_update->total = $total;
            // $order_update->save();
            array_push($order_data, $order_detail);
        }

        $order->total = $total;
        $order->order_db = json_encode($order_data);
        $order->save();

        //add Statistic
        $order_date =  Carbon::now()->toDateString();
        
        $profit_order = Setting::where('setting_name', 'percent_profit')->first();

        $sales = $total;
        $profit = $total * (($profit_order->setting_value)/100);
        $quantity = $quantity_of_cart;
        $statistic_item = Statistic::where('order_date', $order_date)->first();

        if ($statistic_item != null) {
            $statistic_item->sales = $sales + $statistic_item->sales;
            $statistic_item->profit = $profit + $statistic_item->profit;
            $statistic_item->quantity = $quantity + $statistic_item->quantity;
            $statistic_item->total_order = $statistic_item->total_order + 1;
            $statistic_item->save();
        } else {
            $statistic =  new Statistic();
            $statistic->order_date = $order_date;
            $statistic->sales = $sales;
            $statistic->profit = $profit;
            $statistic->quantity = $quantity;
            $statistic->total_order = 1;
            $statistic->save();
        }
        //Gui mail 
        $name = 'Chúc mừng bạn đã đặt hàng thành công';
        $user = User::find($order->user_id);

        Mail::send('emails.order', ["name" => $name, "carts" => $carts, "total" => $total], function ($email) use ($user, $carts, $total) {
            $email->subject("Xác nhận đơn hàng");
            $email->to($user->email, $user->user_name);
        });



        $total =  $total;
        if (isset($request->method_payment) && $request->method_payment == 'vnpay') {

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://laravel_vegetable_office.local/checkout/lich-su-mua-hang";
            $vnp_TmnCode = "6NAJWGAF"; //Mã website tại VNPAY 
            $vnp_HashSecret = "AUJHLJDASCAOFCGVTKRQCJJAASBUMMTK"; //Chuỗi bí mật

            $vnp_TxnRef = $order->id;; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toan demo';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $total * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo

        } elseif (isset($request->method_payment) && $request->method_payment == 'momo') {
            header('Content-type: text/html; charset=utf-8');
            function execPostRequest($url, $data)
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                //execute post
                $result = curl_exec($ch);
                //close connection
                curl_close($ch);
                return $result;
            }



            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua MoMo";
            $amount = $total . "";
            $orderId = time() . "";
            $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
            $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
            $extraData = "";


            $requestId = time() . "";
            $requestType = "captureWallet";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            $result = execPostRequest($endpoint, json_encode($data));

            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there

            header('Location: ' . $jsonResult['payUrl']);
            // echo "thanh toan mômp";
            // return redirect()->back();
            die();
        }


        $news = new News();
        $news->user_id = Auth::id();
        $news->topic = "order";
        $news->link = "order.index";
        $news->created_at =  Carbon::now();
        $news->save();


        return redirect()->route('checkout.lich_su_mua_hang')->with('order_success', 'Đặt hàng thành công, Vui lòng kiểm tra lại Email!');

        // echo "hello";
    }

    public function lich_su_mua_hang()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->with('OrderDetail')->orderBy('id', 'DESC')->paginate(9);


        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        return view('fontend.page.lich_su_mua_hang', compact('categories', 'orders', 'count_wish_list'));
    }

    public function receive_order(Request $request)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $order_id = $request->order_id;
        $order = Order::find($order_id);
        $order->status = 4;
        $order->save();
    }

    public function detroy_order(Request $request, $id)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $order_id = $id;
        // $order = Order::find($order_id);
        // $order->status = -1;
        // $order->reason = $request->reason;
        // $order->save();

        //update quantity product in warehouse

        $orderDetailList = OrderDetail::where('order_id', $order_id)->get();
        foreach($orderDetailList as $orderDetailItem){
            $warehouseItem = Warehouse::where('product_id', $orderDetailItem->pro_id)->first();
            if(isset($warehouseItem)){
                $warehouseItem->import_quantity =  $warehouseItem->import_quantity + $orderDetailItem->pro_quantity;
                $warehouseItem->export_quantity =  $warehouseItem->export_quantity - $orderDetailItem->pro_quantity;
                $warehouseItem->save();
            }
        }
        return redirect()->back()->with('message_success', 'Hủy đơn hàng thành công');
    }

    public function lich_su_mua_hang_filter($status)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->where('status', $status)->with('OrderDetail')->orderBy('id', 'DESC')->paginate(9);
        if ($status == 1) {
            $orders = Order::where('user_id', $user_id)->whereIn('status', [1, 2, 3])->with('OrderDetail')->orderBy('id', 'DESC')->paginate(9);
        }
        // return response()->json($orders);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $title_page = "";

        if ($status == 0) {
            $title_page = "Danh sách đơn hàng chờ xác nhận";
        } else if ($status == 1) {
            $title_page = "Danh sách đơn hàng đang giao";
        } else if ($status == 2) {
            $title_page = "Danh sách đơn hàng đã nhận";
        } else if ($status == -1) {
            $title_page = "Danh sách đơn hàng đã hủy";
        }

        return view('fontend.page.lich_su_mua_hang', compact('categories', 'orders', 'count_wish_list', 'title_page'))->with("message", "Hello ca nha yeu");
    }
}
