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

    public function manager_human_index()
    {
        // $products = Product::with('product_image','category','warehouse')->orderBy('updated_at','DESC')->paginate(20);
        // $product_quantity = Product::count();
        $admins = Admin::get();
        // echo json_encode($admins);
        // die();
        return view('admin.manager_human.index', compact('admins'));
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

    public function change_role_user(){
        $user_id = $_GET['user_id'];
        $role = $_GET['role'];
        $user = Admin::find($user_id);
        if($user){
            $user->role = $role;
            $user->save();
            $data['status'] = 200;
            $data['message'] = "Update role success";
        }else{
            $data['status'] = 403;
            $data['message'] = "Error";
        }
        
        echo json_encode($data);
    }
}
