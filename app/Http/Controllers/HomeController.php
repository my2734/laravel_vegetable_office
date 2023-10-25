<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\CategoryOfBlog;
use App\Models\Tags;
use App\Models\CommentPro;
use App\Models\Wish_List;
use App\Models\User;
use App\Models\User_Info;
use App\Models\News;
use App\Models\Warehouse;
use App\Models\Order;
use Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Route;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        foreach ($categories as $category) {
            $product_each_category = Product::where('status', 1)->where('cat_id', $category->id)->get();
        }
        // echo json_encode($product_each_category);
        // die();
        $products = Product::with('comment', 'warehouse')->where('status', 1)->orderBy('updated_at', 'DESC')->limit(20)->get();
        $product_laster =  Product::where('status', 1)->with('warehouse')->orderBy('updated_at', 'DESC')->limit(3)->get();

        $product_top_rate =  Product::where('status', 1)->where('top_rate', 1)->with('warehouse')->limit(3)->get();
        $blogs =  Blog::orderBy('updated_at', 'DESC')->limit(8)->get();

        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }

        $home_active = true;

        return view('fontend.page.homePage', compact('categories', 'products', 'product_laster', 'product_top_rate', 'blogs', 'count_wish_list', 'home_active'));
    }

    public function category($slug)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $category_slug = Category::where('slug', $slug)->first();
        $products = Product::with('comment', 'warehouse')->where('status', 1)->where('cat_id', $category_slug->id)->paginate(9);
        $product_sales = Product::with('comment', 'warehouse')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status', 1)->where('top_rate', 1)->simplePaginate(3);
        $blogs =  Blog::get();
        // echo json_encode($products);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::id())->count();
        }
        return view('fontend.page.category', compact('categories', 'products', 'product_laster', 'product_top_rate', 'blogs', 'category_slug', 'product_sales', 'count_wish_list'));
    }

    public function product($slug)
    {

        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $product_slug = Product::with('product_image', 'warehouse')->where('slug', $slug)->first();

        $product_relate = Product::where('cat_id', $product_slug->cat_id)->where('id', '<>', $product_slug->id)->get();
        $comments =  CommentPro::where('product_id', $product_slug->id)->with('User')->get();
        // echo json_encode($comments);
        // die();
        $quantity_comment = CommentPro::where('product_id', $product_slug->id)->count();
        //        return response()->json($comment);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }

        // echo json_encode($product_slug);
        // echo $product_slug->warehouse->import_quantity - 
        // die();

        // echo json_encode($comments);
        // die();
        // echo json_encode(Auth::user());
        // die();
        return view('fontend.page.product', compact('categories', 'product_slug', 'product_relate', 'comments', 'quantity_comment', 'count_wish_list'));
    }

    public function all_product()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $products = Product::with('comment', 'warehouse')->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(9);
        $product_sales = Product::with('comment', 'warehouse')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->with('warehouse')->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $shop_active = true;
        return view('fontend.page.all_product', compact('categories', 'products', 'blogs', 'product_sales', 'count_wish_list', 'shop_active'));
    }

    public function blog_detail($slug)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $blogs =  Blog::orderBy('updated_at', 'DESC')->get();
        $blog_detail = Blog::where('slug', $slug)->with('category_of_blog', 'tagses')->first();
        $category_of_blogs = CategoryOfBlog::where('status', 1)->get();
        $tagses = Tags::where('status', 1)->get();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        return view('fontend.page.blog_detail', compact('categories', 'blogs', 'blog_detail', 'category_of_blogs', 'tagses', 'count_wish_list'));
    }

    public function blog()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $blogs =  Blog::orderBy('updated_at', 'DESC')->paginate(6);
        $category_of_blogs = CategoryOfBlog::where('status', 1)->get();
        $tagses = Tags::where('status', 1)->get();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $blog_active = true;
        return view('fontend.page.blog', compact('categories', 'blogs', 'category_of_blogs', 'tagses', 'count_wish_list', 'blog_active'));
    }

    public function category_of_blog($slug)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $blogs =  Blog::orderBy('updated_at', 'DESC')->paginate(6);
        $category_of_blogs = CategoryOfBlog::where('status', 1)->get();
        $tagses = Tags::where('status', 1)->get();
        $category_of_blog_slug = CategoryOfBlog::where('slug', $slug)->first();
        $blog_about_category =  Blog::where('cat_id', $category_of_blog_slug->id)->orderBy('updated_at', 'DESC')->paginate(4);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }

        // echo json_encode($blog_about_category);
        // die();

        $blog_active = true;
        return view('fontend.page.categoryofblog', compact('categories', 'blogs', 'category_of_blogs', 'tagses', 'blog_about_category', 'category_of_blog_slug', 'count_wish_list', 'blog_active'));
    }

    public function tags($slug)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $blogs =  Blog::orderBy('updated_at', 'DESC')->get();
        $category_of_blogs = CategoryOfBlog::where('status', 1)->get();
        $tagses = Tags::where('status', 1)->get();
        $tags_of_blog_slug = Tags::where('slug', $slug)->first();
        $blog_about_tags =  Blog::with('tagses')->orderBy('updated_at', 'DESC')->paginate(6);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $blog_active = true;

        return view('fontend.page.tagsblog', compact('categories', 'blogs', 'category_of_blogs', 'tagses', 'blog_about_tags', 'tags_of_blog_slug', 'count_wish_list', 'blog_active'));
    }

    public function contact(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $user_id = Auth::id();
        $contact_active = true;
        $user_id = Auth::id() ? Auth::id() : "";

        $route = Route::current();

        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
            $name = $user_info->name;
            $avatar = $user_info->avatar;
            $date = date("Y/m/d");
            $time = date("h:i:s");
            return view('fontend.page.contact', compact('categories', 'count_wish_list', 'contact_active', 'user_id', 'name', 'avatar', 'date', 'time'));
        }



        return view('fontend.page.contact', compact('categories', 'count_wish_list', 'contact_active', 'user_id'));
    }

    public function post_mail_conact(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'content'       => 'required'
        ], [
            'name.required'     => 'Vui lòng nhập tên danh mục',
            'email.required'    => 'Vui lòng nhập email của bạn',
            'content'           => 'Vui lòng nhâp nội dung email'
        ]);
        $user_name = $request->name;
        $user_email = $request->email;
        $content = $request->content;
        $name = 'test name for email';
        Mail::send('emails.contact', compact('content'), function ($email) use ($user_name, $user_email) {
            $email->subject("Khách hàng " . $user_name . " thắc mắc");
            $email->to("phammy773734@gmail.com", $user_name);
        });

        $news = new News();
        $news->user_id = Auth::id();
        $news->topic = "gmail";
        $news->link = "https://mail.google.com/mail/u/2/#inbox";
        $news->created_at =  Carbon::now();
        $news->save();

        return redirect()->back()->with('message_success', 'Email của bạn đã được gửi');
    }

    public function get_user_info()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $user_id = Auth::id();
        $user_edit = User_info::where('user_id', $user_id)->first();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }

        return view('fontend.page.user_info', compact('categories', 'user_edit', 'count_wish_list'));
    }

    public function edit_user_info(Request $request)
    {

        $user_id = Auth::id();
        $user = User_Info::where('user_id', $user_id)->first();
        $user_account = User::where('id', $user_id)->first();
        $user_account->name = $request->name;
        $user_account->email = $request->email;
        $user_account->save();

        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->conscious = $request->conscious;
        $user->district = $request->district;
        $user->commune = $request->commune;
        $user->address_detail = $request->address_detail;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        if ($file = $request->file('avatar')) {
            if (isset($user->avatar)) { //remove image exist old
                $path_file_old = public_path() . '\Uploads/' . $user->avatar;
                if (file_exists($path_file_old)) {
                    unlink($path_file_old);
                }
            }
            $path = 'Uploads/';
            $file_name = $file->getClientOriginalName();
            $new_name = current(explode('.', $file_name)) . rand(0, 99) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $new_name);
            $user->avatar = $new_name;
            Auth::user()->avatar = $user->avatar;

            // echo $new_name;
        }





        $user->save();


        return redirect()->back()->with('message_success', 'Cập nhật thông cá nhân tin thành công');
    }



    public function wish_list(Request $request)
    {
        // echo Auth::user()->id;
        $wish_list_exist = Wish_List::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first();
        // echo json_encode($wish_list_exist->user_id);
        if (!isset($wish_list_exist)) {
            $wish_list = new Wish_List();
            $wish_list->product_id = $request->product_id;
            $wish_list->user_id  = Auth::user()->id;
            $wish_list->save();
        }
        return redirect()->back();
    }

    public function get_wish_list()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();

        $wish_list = Wish_List::where('user_id', Auth::user()->id)->with('Product')->get();
        foreach ($wish_list as $key => $wish_list_item) {
            $product_id = $wish_list_item->product_id;
            $warehouse = Warehouse::where('product_id', $product_id)->first();
            $wish_list[$key]['inventory'] = $warehouse->import_quantity - $warehouse->export_quantity;
        }
        // echo json_encode($wish_list);
        // die();
        // return response()->json($orders);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        return view('fontend.page.wishlist', compact('categories', 'wish_list', 'count_wish_list'));
    }

    public function delete_wish_list()
    {
        $wish_list_id = $_GET['wish_list_id'];
        Wish_List::find($wish_list_id)->delete();
        $quantity_product_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        // echo $wish_list_id;
        // echo $quantity_product_wish_list;
        $data = [];
        $data['id_product'] = $wish_list_id;
        $data['quantity_product_wish_list'] = $quantity_product_wish_list;
        return json_encode($data);
    }

    public function search_ajax(Request $request)
    {
        $key = $request->key;
        $list_product = Product::where('status', 1)->where('name', 'LIKE', "%{$key}%")->take(10)->get();
        // return json_encode($list_product[0]->image);
        $html = '<ul style="display: block;">';
        foreach ($list_product as $product) {
            // $html.='<li><a href="http://127.0.0.1:8000/san-pham/'.$product->slug.'">'.$product->name.'</a></li>';
            $html .= '<li style="display:block;" class="mt-3">
                    <a href="http://127.0.0.1:8000/san-pham/' . $product->slug . '"><img height="50" width="50" class="float-left mr-3" src="http://127.0.0.1:8000/Uploads/' . $product->image . '" alt=""></a>
                    <span >
                        <a href="http://127.0.0.1:8000/san-pham/' . $product->slug . '" class="">' . $product->name . '</a><br>
                        <span class="info_search_item">' . $product->created_at . '</span>
                    </span>
                </li>';
        }
        $html .= '</ul>';

        echo $html;
    }

    public function search_product(Request $request)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $search_key = $request->search_key;
        $key = $request->search_key;
        $products = Product::where('status', 1)->where('name', 'LIKE', "%{$key}%")->with('warehouse')->paginate(9);
        $categories = Category::where('status', 1)->get();
        $product_sales = Product::with('comment', 'warehouse')->where('price_promotion', '>', 0)->get();
        $blogs =  Blog::get();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        // return json_encode($products);
        $shop_active = true;
        return view('fontend.page.all_product', compact('categories', 'products', 'blogs', 'product_sales', 'search_key', 'count_wish_list', 'shop_active'));
    }

    public function filter_product(Request $request)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $min_string = $request->minamount;
        $min_array = explode('đ', $min_string);
        $min = $min_array[0];

        $max_string = $request->maxamount;
        $max_array = explode('đ', $max_string);
        $max = $max_array[0];
        $products = Product::where('status', 1)->whereBetween('price_unit', [$min, $max])->with('warehouse')->paginate(9);
        $filter_page = 1;
        $categories = Category::where('status', 1)->get();
        $product_sales = Product::with('comment', 'warehouse')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $shop_active = true;
        return view('fontend.page.all_product', compact('categories', 'products', 'blogs', 'product_sales', 'min', 'max', 'count_wish_list', 'shop_active'));
    }

    public function filter_product_by_category(Request $request)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $slug = $request->cat_slug;
        $min_string = $request->minamount;
        $min_array = explode('đ', $min_string);
        $min = $min_array[0];

        $max_string = $request->maxamount;
        $max_array = explode('đ', $max_string);
        $max = $max_array[0];
        $categories = Category::where('status', 1)->get();
        $category_slug = Category::where('slug', $slug)->first();
        $products = Product::where('status', 1)->whereBetween('price_unit', [$min, $max])->where('cat_id', $category_slug->id)->with('warehouse')->orderBy('updated_at', 'DESC')->paginate(9);

        $product_sales = Product::with('comment', 'warehouse')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status', 1)->where('top_rate', 1)->simplePaginate(3);
        $blogs =  Blog::get();
        // echo json_encode($products);
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        return view('fontend.page.category', compact('categories', 'products', 'product_laster', 'product_top_rate', 'blogs', 'category_slug', 'product_sales', 'min', 'max', 'count_wish_list'));
    }

    public function sort_low_to_high_all_product()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $products = Product::with('comment')->where('status', 1)->orderBy('price_unit', 'ASC')->orderBy('updated_at', 'DESC')->paginate(9);
        $product_sales = Product::with('comment')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        $low_to_high = 1;
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $shop_active = true;
        return view('fontend.page.all_product', compact('categories', 'products', 'blogs', 'product_sales', 'low_to_high', 'count_wish_list', 'shop_active'));
    }

    public function sort_high_to_low_all_product()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }
        $categories = Category::where('status', 1)->get();
        $products = Product::with('comment')->where('status', 1)->orderBy('price_unit', 'DESC')->orderBy('updated_at', 'DESC')->paginate(9);
        $product_sales = Product::with('comment')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        $high_to_low = 1;
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        $shop_active = true;
        return view('fontend.page.all_product', compact('categories', 'products', 'blogs', 'product_sales', 'high_to_low', 'count_wish_list', 'shop_active'));
    }

    public function sort_low_to_high_category($slug)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }

        $categories = Category::where('status', 1)->get();
        $category_slug = Category::where('slug', $slug)->first();
        $products = Product::where('status', 1)->where('cat_id', $category_slug->id)->orderBy('price_unit', 'ASC')->orderBy('updated_at', 'DESC')->paginate(9);

        $product_sales = Product::with('comment')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status', 1)->where('top_rate', 1)->simplePaginate(3);
        $blogs =  Blog::get();
        $low_to_high = 1;
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        return view('fontend.page.category', compact('categories', 'products', 'product_laster', 'product_top_rate', 'blogs', 'category_slug', 'product_sales', 'low_to_high', 'count_wish_list'));
    }


    public function sort_high_to_low_category($slug)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $user_info = User_Info::where('email', $user->email)->first();
            if (!$user_info->user_id) {
                $user_info->user_id = Auth::id();
                $user_info->save();
            }
            Auth::user()->avatar = $user_info->avatar;
        }

        $categories = Category::where('status', 1)->get();
        $category_slug = Category::where('slug', $slug)->first();
        $products = Product::where('status', 1)->where('cat_id', $category_slug->id)->orderBy('price_unit', 'DESC')->orderBy('updated_at', 'DESC')->paginate(9);

        $product_sales = Product::with('comment')->where('price_promotion', '>', 0)->get();
        $product_laster =  Product::where('status', 1)->orderBy('updated_at', 'DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status', 1)->where('top_rate', 1)->simplePaginate(3);
        $blogs =  Blog::get();
        $high_to_low = 1;
        $count_wish_list = 0;
        if (Auth::id()) {
            $count_wish_list = Wish_List::where('user_id', Auth::user()->id)->count();
        }
        return view('fontend.page.category', compact('categories', 'products', 'product_laster', 'product_top_rate', 'blogs', 'category_slug', 'product_sales', 'high_to_low', 'count_wish_list'));
    }
}
