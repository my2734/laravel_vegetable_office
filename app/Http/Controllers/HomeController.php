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
use Mail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    public function index(){
        
        $categories = Category::where('status',1)->get();

        foreach($categories as $category){
            $product_each_category = Product::where('status',1)->where('cat_id',$category->id)->get();
        }
        // echo json_encode($product_each_category);
        // die();
        $products = Product::with('comment')->where('status',1)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->limit(3)->get();
    
        $product_top_rate =  Product::where('status',1)->where('top_rate',1)->limit(3)->get();
        $blogs =  Blog::orderBy('updated_at','DESC')->limit(8)->get();
        
        $count_wish_list = 0;
        if(session('login.id')){
            $count_wish_list = Wish_List::where('user_id',session('login.id'))->count();
        }
        return view('fontend.page.homePage',compact('categories','products','product_laster','product_top_rate','blogs','count_wish_list'));
    }

    public function category($slug){
        $categories = Category::where('status',1)->get();
        $category_slug = Category::where('slug',$slug)->first();
        $products = Product::with('comment')->where('status',1)->where('cat_id',$category_slug->id)->paginate(9);
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status',1)->where('top_rate',1)->simplePaginate(3);
        $blogs =  Blog::get();
        // echo json_encode($products);
        return view('fontend.page.category',compact('categories','products','product_laster','product_top_rate','blogs','category_slug','product_sales'));
    }

    public function product($slug){
        $categories = Category::where('status',1)->get();
        $product_slug = Product::with('product_image')->where('slug',$slug)->first();
        $product_relate = Product::where('cat_id',$product_slug->cat_id)->where('id','<>',$product_slug->id)->get();
        $comments =  CommentPro::where('product_id',$product_slug->id)->with('User')->get();
        $quantity_comment = CommentPro::where('product_id',$product_slug->id)->count();
//        return response()->json($comment);

        return view('fontend.page.product',compact('categories','product_slug','product_relate','comments','quantity_comment'));
    }

    public function all_product(){
        $categories = Category::where('status',1)->get();
        $products = Product::with('comment')->where('status',1)->paginate(9);
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        return view('fontend.page.all_product',compact('categories','products','blogs','product_sales'));
    }

    public function blog_detail($slug){
        $categories = Category::where('status',1)->get();
        $blogs =  Blog::orderBy('updated_at','DESC')->get();
        $blog_detail = Blog::where('slug',$slug)->with('category_of_blog','tagses')->first();
        $category_of_blogs = CategoryOfBlog::where('status',1)->get();
        $tagses = Tags::where('status',1)->get();

        return view('fontend.page.blog_detail',compact('categories','blogs','blog_detail','category_of_blogs','tagses'));
    }

    public function blog(){
        $categories = Category::where('status',1)->get();
        $blogs =  Blog::orderBy('updated_at','DESC')->paginate(6);
        $category_of_blogs = CategoryOfBlog::where('status',1)->get();
        $tagses = Tags::where('status',1)->get();
        return view('fontend.page.blog',compact('categories','blogs','category_of_blogs','tagses'));
    }

    public function category_of_blog($slug){
        $categories = Category::where('status',1)->get();
        $blogs =  Blog::orderBy('updated_at','DESC')->paginate(6);
        $category_of_blogs = CategoryOfBlog::where('status',1)->get();
        $tagses = Tags::where('status',1)->get();
        $category_of_blog_slug = CategoryOfBlog::where('slug',$slug)->first();
        $blog_about_category =  Blog::where('cat_id',$category_of_blog_slug->id)->orderBy('updated_at','DESC')->get();
        return view('fontend.page.categoryofblog',compact('categories','blogs','category_of_blogs','tagses','blog_about_category','category_of_blog_slug'));
    }

    public function tags($slug){
        $categories = Category::where('status',1)->get();
        $blogs =  Blog::orderBy('updated_at','DESC')->get();
        $category_of_blogs = CategoryOfBlog::where('status',1)->get();
        $tagses = Tags::where('status',1)->get();
        $tags_of_blog_slug = Tags::where('slug',$slug)->first();
        $blog_about_tags =  Blog::with('tagses')->orderBy('updated_at','DESC')->get();
        return view('fontend.page.tagsblog',compact('categories','blogs','category_of_blogs','tagses','blog_about_tags','tags_of_blog_slug'));
    }

    public function contact(){
        $categories = Category::where('status',1)->get();
        return view('fontend.page.contact',compact('categories'));
    }

    public function post_mail_conact(Request $request){
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'content'       => 'required'
        ],[
            'name.required'     => 'Vui lòng nhập tên danh mục',
            'email.required'    => 'Vui lòng nhập email của bạn',
            'content'           => 'Vui lòng nhâp nội dung email'
        ]);
        $user_name = $request->name;
        $user_email =$request->email;
        $content = $request->content;
        $name = 'test name for email';
        Mail::send('emails.contact',compact('content'),function($email) use ($user_name,$user_email) {
            $email->subject("Khách hàng ".$user_name." thắc mắc");
            $email->to("phammy773734@gmail.com",$user_name);
        });
        return redirect()->back()->with('message_success','Email của bạn đã được gửi');
    }

    public function get_user_info(){
        $categories = Category::where('status',1)->get();
        $user_id = Auth::id();
        $user_edit = User::find($user_id);
        
        return view('fontend.page.user_info',compact('categories','user_edit'));
    }

    public function edit_user_info(Request $request){
        // echo json_encode($request->input());
        // die();
        $user_id = Auth::id();
        $user = User::find($user_id);  
        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->conscious = $request->conscious;
        $user->district = $request->district;
        $user->commune = $request->commune;
        $user->address_detail = $request->address_detail;
        $user->password = bcrypt($request->password);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        if($file = $request->file('avatar')){
            if(isset($user->avatar)){
                $path_file_old = public_path().'\Uploads/'.$user->avatar;
                if(file_exists($path_file_old)){
                    unlink($path_file_old);
                }
            }
            $path = 'Uploads/';
            $file_name = $file->getClientOriginalName();
            $new_name = current(explode('.',$file_name)).rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_name);
            $user->avatar = $new_name;
            // echo $new_name;
        }
       
        $user->save();
       

        // Auth::user()->avatar;
        // die();

        return redirect()->back()->with('message_success','Cập nhật thông cá nhân tin thành công');
    }

    

    public function wish_list(Request $request){
        $wish_list_exist = Wish_List::where('user_id',session('login.id'))->where('product_id',$request->product_id)->first();
        // echo json_encode($wish_list_exist->user_id);
        if(!isset($wish_list_exist)){
            $wish_list = new Wish_List();
            $wish_list->product_id = $request->product_id;
            $wish_list->user_id  = session('login.id');
            $wish_list->save();
        }
        return redirect()->back();
    }

    public function get_wish_list(){
        echo "hello ca nha ye";
    }

    public function search_ajax(Request $request){
        $key = $request->key;
        $list_product = Product::where('status',1)->where('name','LIKE',"%{$key}%")->take(10)->get();
        $html = '<ul style="display: block;">';
        foreach($list_product as $product){
            // $html.='<li><a href="http://127.0.0.1:8001/san-pham/'.$product->slug.'">'.$product->name.'</a></li>';
            $html.='<li style="display:block;" class="mt-3">
                    <a href="http://127.0.0.1:8001/san-pham/'.$product->slug.'"><img height="50" width="50" class="float-left mr-3" src="http://127.0.0.1:8001/Uploads/'.$product->image.'" alt=""></a>
                    <span >
                        <a href="http://127.0.0.1:8001/san-pham/'.$product->slug.'" class="">'.$product->name.'</a><br>
                        <span class="info_search_item">'.$product->created_at.'</span>
                    </span>
                </li>';

        }
        $html.='</ul>';
        
    echo $html;
    }

    public function search_product(Request $request){
        $search_key = $request->search_key;

        $key = $request->search_key;
        $products = Product::where('status',1)->where('name','LIKE',"%{$key}%")->paginate(9);
        $categories = Category::where('status',1)->get();
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        return view('fontend.page.all_product',compact('categories','products','blogs','product_sales','search_key'));
    }

    public function filter_product(Request $request){
        $min_string = $request->minamount;
        $min_array = explode('$',$min_string);
        $min = $min_array[1];

        $max_string = $request->maxamount;
        $max_array = explode('$',$max_string);
        $max = $max_array[1];

        $products = Product::where('status',1)->whereBetween('price_unit',[$min,$max])->paginate(9);
        $filter_page=1;
        $categories = Category::where('status',1)->get();
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        return view('fontend.page.all_product',compact('categories','products','blogs','product_sales','min','max'));
    }

    public function filter_product_by_category(Request $request){
        $slug = $request->cat_slug;
        $min_string = $request->minamount;
        $min_array = explode('$',$min_string);
        $min = $min_array[1];

        $max_string = $request->maxamount;
        $max_array = explode('$',$max_string);
        $max = $max_array[1];

        $categories = Category::where('status',1)->get();
        $category_slug = Category::where('slug',$slug)->first();
        $products = Product::where('status',1)->whereBetween('price_unit',[$min,$max])->where('cat_id',$category_slug->id)->paginate(9);
        
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status',1)->where('top_rate',1)->simplePaginate(3);
        $blogs =  Blog::get();
        // echo json_encode($products);
        return view('fontend.page.category',compact('categories','products','product_laster','product_top_rate','blogs','category_slug','product_sales','min','max'));
    }

    public function sort_low_to_high_all_product(){
        $categories = Category::where('status',1)->get();
        $products = Product::with('comment')->where('status',1)->orderBy('price_unit','ASC')->paginate(9);
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        $low_to_high=1;
        return view('fontend.page.all_product',compact('categories','products','blogs','product_sales','low_to_high'));
    }

    public function sort_high_to_low_all_product(){
        $categories = Category::where('status',1)->get();
        $products = Product::with('comment')->where('status',1)->orderBy('price_unit','DESC')->paginate(9);
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $blogs =  Blog::get();
        $high_to_low=1;
        return view('fontend.page.all_product',compact('categories','products','blogs','product_sales','high_to_low'));
    }

    public function sort_low_to_high_category($slug){

        $categories = Category::where('status',1)->get();
        $category_slug = Category::where('slug',$slug)->first();
        $products = Product::where('status',1)->where('cat_id',$category_slug->id)->orderBy('price_unit','ASC')->paginate(9);
        
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status',1)->where('top_rate',1)->simplePaginate(3);
        $blogs =  Blog::get();
        $low_to_high=1;
        return view('fontend.page.category',compact('categories','products','product_laster','product_top_rate','blogs','category_slug','product_sales','low_to_high'));
    }
    

    public function sort_high_to_low_category($slug){
        $categories = Category::where('status',1)->get();
        $category_slug = Category::where('slug',$slug)->first();
        $products = Product::where('status',1)->where('cat_id',$category_slug->id)->orderBy('price_unit','DESC')->paginate(9);
        
        $product_sales = Product::with('comment')->where('price_promotion','>',0)->get();
        $product_laster =  Product::where('status',1)->orderBy('updated_at','DESC')->simplePaginate(3);
        $product_top_rate =  Product::where('status',1)->where('top_rate',1)->simplePaginate(3);
        $blogs =  Blog::get();
        $high_to_low=1;
        return view('fontend.page.category',compact('categories','products','product_laster','product_top_rate','blogs','category_slug','product_sales','high_to_low'));
    }
    
}
