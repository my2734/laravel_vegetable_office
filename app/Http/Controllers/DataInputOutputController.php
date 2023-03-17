<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class DataInputOutputController extends Controller
{
    // nhap hang

    public function input_index(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->paginate(20);
        
        return view('admin.data_input_output.input_index',compact('products'));
    }

    public function input_create(){
        $categories = Category::where('status',1)->get();
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        return view('admin.data_input_output.input_create',compact('products'));
    }

    public function input_store(Request $request){
        echo json_encode($request);
        die();
    }


    //xuat hang
    public function output_index(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->paginate(20);
        $product_quantity = Product::count();
        
        return view('admin.data_input_output.output_index',compact('products','product_quantity'));
        
    }

    public function output_create(){
        $categories = Category::where('status',1)->get();
        return view('admin.data_input_output.output_create',compact('categories'));
    }


}
