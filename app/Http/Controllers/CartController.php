<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\CategoryOfBlog;
use App\Models\Tags;
use App\Models\Warehouse;
// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_Info;
use App\Models\Wish_List;
use Cart;

class CartController extends Controller
{
    public function add_one_cart(Request $request)
    {
        $id = $request->id_product;
        $qty = $request->qty;
        $product = Product::find($id);

        $warehouse = Warehouse::where('product_id', $id)->first();
        $max_qty = (int)$warehouse->import_quantity - (int)$warehouse->export_quantity;

        if($qty > $max_qty){
            $data = [
                'status' => 401,
                'message' => 'Over quantity limit product',
            ];
            $data['cart_qty'] = Cart::count();
            $data['cart_total'] = Cart::total();
            return response()->json($data);
        }else{
            $data = array();
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $qty;
            $data['price'] = ($product->price_promotion != 0) ? $product->price_promotion : $product->price_unit;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image;
            $data['options']['slug'] = $product->slug;
            $cart = Cart::add($data);
            Cart::setTax($cart->rowId, 0);
            $data['cart_qty'] = Cart::count();
            $data['cart_total'] = Cart::total();
            return response()->json($data);
        }
    }

    public function show_cart()
    {
        //        return response()->json(Cart::tax());
        if (Auth::id()) {
            $user = User::find(Auth::id());
           $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $carts = Cart::content();
        $categories = Category::where('status', 1)->get();
        $sub_total = Cart::total();
        $count_wish_list = 0;

        if (Auth::user()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $quantity_cart = count($carts);

        if(Auth::id()){
            $user = User::find(Auth::id());
           $user_info = User_Info::where('user_id', Auth::id())->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
            $name = $user_info->name;
            $avatar = $user_info->avatar;
            $date = date("Y/m/d");
            $time = date("h:i:s");
            return view('fontend.page.shoping_cart', compact('carts', 'categories', 'sub_total', 'count_wish_list', 'quantity_cart','name', 'avatar','date','time'));
        }
        return view('fontend.page.shoping_cart', compact('carts', 'categories', 'sub_total', 'count_wish_list', 'quantity_cart'));
    }

    public function delete_one_cart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function update_cart(Request $request)
    {
        $data = array();
        $rowId = $request->rowId;
        $qty = $request->qty;

        //find quantity product 
        $cart_old = Cart::get($rowId);
        $warehouse = Warehouse::where('product_id', $cart_old->id)->first();
        $max_qty = (int)$warehouse->import_quantity - (int)$warehouse->export_quantity;

        if($qty > $max_qty){
            $res = [
                'status' => 401,
                'message' => 'Over quantity limit product',
            ];
            return response()->json($res);
        }else{
            Cart::update($rowId, $qty);
            $cart = Cart::get($rowId);
            $data['status'] = 200;
            $data['rowId'] = $rowId;
            $data['total_count'] = Cart::count();
            $data['price_pro'] = number_format($cart->price * $cart->qty);
            $data['total_cart'] = Cart::total();
            return response()->json($data);
        }

    }

    function check_quantity(Request $request){
        $id_product = $request->id_product;
        $qty = $request->qty;
        // echo json_encode(Cart::content());

        // $qty_new = $qty + 
        // $data['id_product'] = $id_product;
        // $data['qty'] = $qty;
        // echo json_encode($data);
    }   
}
