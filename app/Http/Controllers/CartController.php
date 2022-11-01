<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\CategoryOfBlog;
use App\Models\Tags;

use Cart;
class CartController extends Controller
{
    public function add_one_cart(Request $request){
        $id = $request->id_product;
        $qty = $request->qty;
        $product = Product::find($id);
        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['qty'] = $qty;
        $data['price'] = ($product->price_promotion!=0) ? $product->price_promotion : $product->price_unit;
        $data['weight'] = 1;
        $data['options']['image'] = $product->image;
        $data['options']['slug'] = $product->slug;
        $cart = Cart::add($data);
        Cart::setTax($cart->rowId, 0);
        $data['cart_qty'] = Cart::count();
        $data['cart_total'] = Cart::total();

        return response()->json($data);
    }

    // public function add_cart(Request $request){
    //     return response()->json($request);
    // }

    public function show_cart(){
//        return response()->json(Cart::tax());
        $carts = Cart::content();
        $categories = Category::where('status',1)->get();
        $sub_total = Cart::total();
        return view('fontend.page.shoping_cart',compact('carts','categories','sub_total'));
    }

    public function delete_one_cart($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function update_cart(Request $request){
        $data = array();
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $cart = Cart::get($rowId);
        $data['rowId'] = $rowId;
        $data['total_count'] = Cart::count();
//        $data['quantity_pro'] = $cart->quantity;
        $data['price_pro'] = $cart->price*$cart->qty;
        $data['total_cart'] = Cart::total();
        return response()->json($data);
    }


}
