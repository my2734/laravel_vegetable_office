<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Statistic;
use App\Models\Order;
use App\Models\Product;
use App\Models\Blog;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function index(){
        $total_user = User::count();
        $total_order = Order::count();
        $total_product = Product::count();
        $total_blog = Blog::count();
        // echo json_encode(session('admin.name'));
        //     die();
        return view('admin.index',compact('total_user','total_order','total_product','total_blog'));
    }

    public function list_user(){
        $list_user = User::get();
        return view('admin.user.index',compact('list_user'));
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
}
