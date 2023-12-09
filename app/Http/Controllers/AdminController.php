<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Statistic;
use App\Models\Order;
use App\Models\Product;
use App\Models\Blog;
use App\Models\User;
use App\Models\User_Info;
use App\Models\Admin;
use App\Models\News;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();
        $total_user = User::count();
        $total_order = Order::count();
        $total_product = Product::count();
        $total_blog = Blog::count();

        $products = Product::with('product_image', 'category')->orderBy('updated_at', 'DESC')->get();
        return view('admin.index', compact('total_user', 'total_order', 'total_product', 'total_blog', 'products', 'news', 'total_news'));
    }

    public function manager_human_create()
    {
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();
        return view('admin.manager_human.create', compact('news', 'total_news'));
    }

    public function manager_human_store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'phone'                 => 'required',
            'password'              => 'required',
        ], [
            'name.required'         => 'Vui lòng nhập tên',
            'email.required'        => 'Vui lòng nhập email',
            'phone.required'       => 'Vui lòng nhập số điện thoại',
            'password.required'     => 'Vui lòng nhập mật khẩu',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->role = isset($request->role) ? isset($request->role) : 0;
        $admin->password = bcrypt($request->password);

        $admin->save();
        return redirect()->route('manager_human.index');
    }

    public function list_user()
    {
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();
        $list_user = User::with('User_Info')->get();
        return view('admin.user.index', compact('list_user', 'total_news', 'news'));
    }

    public function thongke_start_end()
    {
        $ngaybatdau = $_GET['ngaybatdau'];
        $ngayketthuc =  $_GET['ngayketthuc'];
        $list_order = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();
        if (count($list_order) > 0) {
            foreach ($list_order as $key => $val) {
                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity'   => $val->quantity
                );
            }
        } else {
            $chart_data = [];
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function thongke_7_date()
    {
        $ngaybatdau = Carbon::now()->subDay(7)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();
        if (count($list_order) > 0) {
            foreach ($list_order as $key => $val) {
                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity'   => $val->quantity
                );
            }
        } else {
            $chart_data = [];
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function thongke_30_date()
    {
        $ngaybatdau = Carbon::now()->subDay(30)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();
        if (count($list_order) > 0) {
            foreach ($list_order as $key => $val) {
                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity'   => $val->quantity
                );
            }
        } else {
            $chart_data = [];
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function thongke_90_date()
    {
        $ngaybatdau = Carbon::now()->subDay(90)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();
        if (count($list_order) > 0) {
            foreach ($list_order as $key => $val) {
                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity'   => $val->quantity
                );
            }
        } else {
            $chart_data = [];
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function manager_human_index(Request $request)
    {
        $admins = Admin::get();
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();

        // echo json_encode($admins);
        // echo json_encode($request->session()->all());
        // die();

        return view('admin.manager_human.index', compact('admins', 'news', 'total_news'));
    }

    public function manager_human_delete_role($id)
    {

        Admin::find($id)->delete();
        $admins = Admin::get();
        return view('admin.manager_human.index', compact('admins'));
    }

    public function manager_human_change_role()
    {
        $id = $_GET['id'];
        $role = $_GET['role'];

        $admin = Admin::find($id);
        $admin->role = ($role == 'Admin') ? 0 : 1;
        $admin->save();

        $data = [];
        $data['id'] = $id;
        $data['role'] = $role;
        return json_encode($data);
    }

    public function manager_human_change_user_current($id)
    {
        $admin  = Admin::find($id);
        $email = $admin->email;
        $password = $admin->password;
        // $arr = [
        //     'email' => $email,
        //     'password' => $password,
        // ];
        Auth::guard('admin')->logout();

        //login
        Route::post('/admin-login', array(
            'email' => $email,
            'password'   => $password
        ));
    }

    public function news_change_status()
    {
        $news_id = $_GET['news_id'];
        $news = News::find($news_id);
        $news->status = 1;
        $news->save();
        $data = [];
        $data['id'] = $news_id;
        $data['total_news'] = News::where('status', 0)->count();
        return json_encode($data);
    }

    public function search_ajax_admin(Request $request)
    {
        $key = $request->key;
        $list_product = Product::where('status', 1)->where('name', 'LIKE', "%{$key}%")->take(10)->get();
        // return json_encode($list_product[0]->image);
        $html = '<ul style="display: block;">';
        foreach ($list_product as $product) {
            // $html.='<li><a href="http://127.0.0.1:8000/san-pham/'.$product->slug.'">'.$product->name.'</a></li>';
            $html .= '<li style="display:block;" class="mt-3">
                    <a href="http://127.0.0.1:8000/admin/san-pham/edit/' . $product->id . '"><img height="50" width="50" class="float-left mr-3" src="http://127.0.0.1:8000/Uploads/' . $product->image . '" alt=""></a>
                    <span >
                        <a href="http://127.0.0.1:8000/admin/san-pham/edit/' . $product->id . '" class="">' . $product->name . '</a><br>
                        <span class="info_search_item">' . $product->created_at . '</span>
                    </span>
                </li>';
        }
        $html .= '</ul>';

        echo $html;
    }

    public function change_role_user()
    {
        $user_id = $_GET['user_id'];
        $role = $_GET['role'];
        $user = Admin::find($user_id);
        if ($user) {
            $user->role = $role;
            $user->save();
            $data['status'] = 200;
            $data['message'] = "Update role success";
        } else {
            $data['status'] = 403;
            $data['message'] = "Error";
        }

        echo json_encode($data);
    }

    public function top_4_product_sale_7_date_ago()
    {

        /*
        * { product_id: 343343434, product_qty}
        */
        $dataListProduct = [];

        $ngaybatdau = Carbon::now()->subDay(7)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = OrderDetail::whereBetween('created_at', [$ngaybatdau, $ngayketthuc])->orderby('created_at', 'asc')->get();



        foreach ($list_order as $orderDetail) {
            $productIdOrder = $orderDetail->pro_id;
            $isExit = false;
            $keyInData = 0;
            foreach ($dataListProduct as $key => $dataProduct) {
                if (in_array($productIdOrder, $dataProduct)) {
                    $isExit = true;
                    $keyInData = $key;
                }
            }


            if (isset($isExit) && $isExit == true && isset($keyInData) && $keyInData == true) {
                //cap nhat lai
                $dataListProduct[$keyInData] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$dataListProduct[$keyInData]['value'] + (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            } else {
                //tao moi
                $dataListProduct[count($dataListProduct)] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            }
        }
        usort($dataListProduct, function ($a, $b) {
            return $b['value'] - $a['value'];
        });

        return json_encode([
            'message' => 'Top selling products of the week',
            'data' => array_slice($dataListProduct, 0, 4),
            'status' => '200'
        ]);
    }


    public function top_4_product_sale_30_date_ago()
    {
        /*
        * { product_id: 343343434, product_qty}
        */
        $dataListProduct = [];

        $ngaybatdau = Carbon::now()->subDay(30)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = OrderDetail::whereBetween('created_at', [$ngaybatdau, $ngayketthuc])->orderby('created_at', 'asc')->get();



        foreach ($list_order as $orderDetail) {
            $productIdOrder = $orderDetail->pro_id;
            $isExit = false;
            $keyInData = 0;
            foreach ($dataListProduct as $key => $dataProduct) {
                if (in_array($productIdOrder, $dataProduct)) {
                    $isExit = true;
                    $keyInData = $key;
                }
            }


            if (isset($isExit) && $isExit == true && isset($keyInData) && $keyInData == true) {
                //cap nhat lai
                $dataListProduct[$keyInData] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$dataListProduct[$keyInData]['value'] + (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            } else {
                //tao moi
                $dataListProduct[count($dataListProduct)] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            }
        }
        usort($dataListProduct, function ($a, $b) {
            return $b['value'] - $a['value'];
        });

        return json_encode([
            'message' => 'Top selling products of the month',
            'data' => array_slice($dataListProduct, 0, 4),
            'status' => '200'
        ]);
    }

    public function top_4_product_sale_90_date_ago()
    {
        /*
        * { product_id: 343343434, product_qty}
        */
        $dataListProduct = [];

        $ngaybatdau = Carbon::now()->subDay(90)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = OrderDetail::whereBetween('created_at', [$ngaybatdau, $ngayketthuc])->orderby('created_at', 'asc')->get();



        foreach ($list_order as $orderDetail) {
            $productIdOrder = $orderDetail->pro_id;
            $isExit = false;
            $keyInData = 0;
            foreach ($dataListProduct as $key => $dataProduct) {
                if (in_array($productIdOrder, $dataProduct)) {
                    $isExit = true;
                    $keyInData = $key;
                }
            }


            if (isset($isExit) && $isExit == true && isset($keyInData) && $keyInData == true) {
                //cap nhat lai
                $dataListProduct[$keyInData] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$dataListProduct[$keyInData]['value'] + (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            } else {
                //tao moi
                $dataListProduct[count($dataListProduct)] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            }
        }
        usort($dataListProduct, function ($a, $b) {
            return $b['value'] - $a['value'];
        });

        return json_encode([
            'message' => 'Top selling products of 3 month ago',
            'data' => array_slice($dataListProduct, 0, 4),
            'status' => '200'
        ]);
    }

    function top_4_product_sale_start_end()
    {

        $dataListProduct = [];

        $ngaybatdau = $_GET['ngaybatdau'];
        $ngayketthuc =  $_GET['ngayketthuc'];

        $list_order = OrderDetail::whereBetween('created_at', [$ngaybatdau, $ngayketthuc])->orderby('created_at', 'asc')->get();



        foreach ($list_order as $orderDetail) {
            $productIdOrder = $orderDetail->pro_id;
            $isExit = false;
            $keyInData = 0;
            foreach ($dataListProduct as $key => $dataProduct) {
                if (in_array($productIdOrder, $dataProduct)) {
                    $isExit = true;
                    $keyInData = $key;
                }
            }


            if (isset($isExit) && $isExit == true && isset($keyInData) && $keyInData == true) {
                //cap nhat lai
                $dataListProduct[$keyInData] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$dataListProduct[$keyInData]['value'] + (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            } else {
                //tao moi
                $dataListProduct[count($dataListProduct)] = [
                    'product_id' => $productIdOrder,
                    'value' => (int)$orderDetail->pro_quantity,
                    'label' => $orderDetail->pro_name,
                ];
            }
        }
        usort($dataListProduct, function ($a, $b) {
            return $b['value'] - $a['value'];
        });

        return json_encode([
            'message' => 'Top selling products of '.$ngaybatdau.' to '.$ngayketthuc,
            'data' => array_slice($dataListProduct, 0, 4),
            'status' => '200'
        ]);
    }


    public function profit_start_end(){
        $ngaybatdau = $_GET['ngaybatdau'];
        $ngayketthuc =  $_GET['ngayketthuc'];
        $statisticales = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();

        $profit = 0;
        $revenue = 0;
        foreach($statisticales as $statistical){
            $revenue += $statistical->sales;
            $profit += $statistical->profit;
        }

        return json_encode([
            'message' => 'Profit and revenue of '.$ngaybatdau.' to '.$ngayketthuc,
            'data' => [
                'revenue' => number_format($revenue),
                'profit' => number_format($profit)
            ],
            'status' => 200,
        ]);
    }

    public function profit_7_date_ago(){
        $ngaybatdau = Carbon::now()->subDay(7)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $statisticales = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();

        $profit = 0;
        $revenue = 0;
        foreach($statisticales as $statistical){
            $revenue += $statistical->sales;
            $profit += $statistical->profit;
        }

        return json_encode([
            'message' => 'Profit and revenue of 7 date ago',
            'data' => [
                'revenue' => number_format($revenue),
                'profit' => number_format($profit)
            ],
            'status' => 200,
        ]);
    }

    public function profit_30_date_ago(){
        $ngaybatdau = Carbon::now()->subDay(30)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $statisticales = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();

        $profit = 0;
        $revenue = 0;
        foreach($statisticales as $statistical){
            $revenue += $statistical->sales;
            $profit += $statistical->profit;
        }

        return json_encode([
            'message' => 'Profit and revenue of 1 month ago',
            'data' => [
                'revenue' => number_format($revenue),
                'profit' => number_format($profit)
            ],
            'status' => 200,
        ]);
    }

    public function profit_90_date_ago(){
        $ngaybatdau = Carbon::now()->subDay(90)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $statisticales = Statistic::whereBetween('order_date', [$ngaybatdau, $ngayketthuc])->orderby('order_date', 'asc')->get();

        $profit = 0;
        $revenue = 0;
        foreach($statisticales as $statistical){
            $revenue += $statistical->sales;
            $profit += $statistical->profit;
        }

        return json_encode([
            'message' => 'Profit and revenue of 3 month ago',
            'data' => [
                'revenue' => number_format($revenue),
                'profit' => number_format($profit)
            ],
            'status' => 200,
        ]);
    }
}
