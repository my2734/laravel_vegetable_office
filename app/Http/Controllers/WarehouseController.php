<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\News;
use App\Models\Warehouse;



class WarehouseController extends Controller
{
    //
    public function index(){
        $products = Product::with('product_image','category','warehouse')->orderBy('updated_at','DESC')->paginate(20);
        $product_quantity = Product::count();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.warehouse.index',compact('products','product_quantity','news','total_news'));
    }

    public function import_quantity(Request $request,$id){
        $warehouse = Warehouse::where('product_id',$id)->first();
        $warehouse->import_quantity = (int)($request->quantity) + $warehouse->import_quantity;
        $warehouse->save();
        return redirect()->back();
    }

    public function search_product(Request $request){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $key = $request->search_key;
        $products = Product::with('product_image','category')->where('name','LIKE',"%{$key}%")->orderBy('updated_at','DESC')->paginate(20);
        $categories = Category::get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.warehouse.index',compact('products','categories','news','total_news'));
    }

}
