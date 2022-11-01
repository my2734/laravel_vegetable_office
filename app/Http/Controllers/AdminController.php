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
}
