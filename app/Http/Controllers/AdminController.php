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

use Auth;

class AdminController extends Controller
{
    public function index(){
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        
    

        $total_user = User::count();
        $total_order = Order::count();
        $total_product = Product::count();
        $total_blog = Blog::count();

        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        return view('admin.index',compact('total_user','total_order','total_product','total_blog','products','news','total_news'));
    }

    public function list_user(){
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        $list_user = User::with('User_Info')->get();
        return view('admin.user.index',compact('list_user','total_news','news'));
    }

    public function thongke_start_end(){
        $ngaybatdau = $_GET['ngaybatdau'];
        $ngayketthuc =  $_GET['ngayketthuc'];
        $list_order = Statistic::whereBetween('order_date',[$ngaybatdau,$ngayketthuc])->orderby('order_date','asc')->get();
        foreach($list_order as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity'   => $val->quantity
            );
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function thongke_7_date(){
        $ngaybatdau = Carbon::now()->subDay(7)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = Statistic::whereBetween('order_date',[$ngaybatdau,$ngayketthuc])->orderby('order_date','asc')->get();
        foreach($list_order as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity'   => $val->quantity
            );
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function thongke_30_date(){
        $ngaybatdau = Carbon::now()->subDay(30)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = Statistic::whereBetween('order_date',[$ngaybatdau,$ngayketthuc])->orderby('order_date','asc')->get();
        foreach($list_order as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity'   => $val->quantity
            );
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function thongke_90_date(){
        $ngaybatdau = Carbon::now()->subDay(90)->toDateString();
        $ngayketthuc =  Carbon::now()->toDateString();
        $list_order = Statistic::whereBetween('order_date',[$ngaybatdau,$ngayketthuc])->orderby('order_date','asc')->get();
        foreach($list_order as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity'   => $val->quantity
            );
        }
        $data['chart_data'] = $chart_data;
        $data['ngaybatdau'] = $ngaybatdau;
        $data['ngayketthuc'] = $ngayketthuc;
        echo json_encode($data);
    }

    public function manager_human_index(){
        // $products = Product::with('product_image','category','warehouse')->orderBy('updated_at','DESC')->paginate(20);
        // $product_quantity = Product::count();
        $admins = Admin::get();
        // echo json_encode($admins);
        // die();
        return view('admin.manager_human.index',compact('admins'));
    }

    public function manager_human_delete_role(){
        $id = $_GET['id'];
        Admin::find($id)->delete();
        echo $id;
    }

    public function manager_human_change_role(){
        $id = $_GET['id'];
        $role = $_GET['role'];
        
        $admin = Admin::find($id);
        $admin->role = ($role=='Admin') ? 0 : 1;
        $admin->save();
       
        $data= [];
        $data['id'] = $id;
        $data['role'] = $role;
        return json_encode($data);
    }

    public function manager_human_change_user_current($id){
        $admin  = Admin::find($id);
        $email = $admin->email;
        $password = $admin->password;
        // $arr = [
        //     'email' => $email,
        //     'password' => $password,
        // ];
        Auth::guard('admin')->logout();
        
        //login
        Route::post('/admin-login',array(
            'email' => $email,
            'password'   => $password
        ));

    
        // if (Auth::guard('admin')->attempt($arr)) {
            
        //     $admin = Admin::where('email',$request->email)->first();
        //     $request->session()->put('admin.name',$admin->name);
        //     $request->session()->put('admin.id',$admin->id);
        //     echo json_encode($admin);
        //     return redirect()->back();
        //     die();
        // }else{
        //     echo "khong thanh cong";
        //     die();
        //     return redirect()->back()->with('login_fail','Đăng nhập thất bại');
        // }
        
    }

    public function news_change_status(){
        $news_id = $_GET['news_id'];
        $news = News::find($news_id);
        $news->status = 1;
        $news->save();
        $data = [];
        $data['id'] = $news_id;
        $data['total_news'] = News::where('status',0)->count();
        return json_encode($data);
    }
}
