<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Image;
use App\Models\CommentPro;
use App\Models\Warehouse;
use App\Models\News;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index(){
        $categories = Category::get();
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->paginate(20);
        // return response()->json($products[0]->category->name);
        $product_quantity = Product::count();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        
        return view('admin.product.index',compact('products','product_quantity','categories','news','total_news'));
    }

    public function create(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $categories = Category::where('status',1)->get();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        return view('admin.product.create',compact('categories','news','total_news'));
    }

    public function store(Request $request){
        // echo json_encode($request->input());
        // die();
        $request->validate([
            'name'                  => 'required',
            'price_unit'            => 'required|numeric',
            // 'quantity'              => 'required|numeric',
            'images'                 => 'required'
        ],[
            'name.required'         => 'Vui lòng nhập tên sản phẩm',
            'price_unit.required'   => 'Vui lòng nhập giá sản phẩm',
            'price_unit.numeric'    => 'Nhập sai định dạng',
            // 'quantity.required'     => 'Vui lòng nhập số lượng',
            'quantity.numeric'      => 'Nhập sai định dạng',
            'images'                => 'Vui lòng nhập hình ảnh sản phẩm'
        ]);
        $product = new Product();
        $product->id = Carbon::now()->timestamp;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price_unit = (int)$request->price_unit;
        $product->price_promotion = (int)$request->price_promotion;
        $product->description = $request->description;
        $product->status = isset($request->status) ? 1 : 0;
        // $product->quantity = isset($request->quantity) ? (int)($request->quantity) : 0;
        $product->cat_id = $request->cat_id;
        $product->top_rate = isset($request->top_rate) ? 1 : 0;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->image = "";

        // Image


        if($files = $request->file('images')){
            $path = "Uploads/";
            foreach($files as $key => $file){
                $name_file = $file->getClientOriginalName();
                $new_name = current(explode('.',$name_file)).rand(0,100).'.'.$file->getClientOriginalExtension();
                $file->move($path,$new_name);
                if($key == 0){
                    $product->image = $new_name;
                }
                // table product_iamge
                $product_image = new Product_Image();
                $product_image->product_id = $product->id;
                $product_image->image = $new_name;
                $product_image->save();
            }
        }
      
        $product->save();
        $warehouse = new Warehouse();
        $warehouse->product_id = $product->id;
        $warehouse->save();
        return redirect()->route('product.index');
    }

    public function delete($id){
        //unlink image product
        $product = Product::where('id',$id)->with('product_image')->first();
        foreach($product->product_image as $pro_image){
            $path_file = public_path().'\Uploads/'.$pro_image->image;
            if(file_exists($path_file)){
                unlink($path_file);
            }
        }
        $product->delete();
        $product_images = Product_Image::where('product_id',$product->id)->delete();
        return redirect()->route('product.index');
    }

    public function edit($id){
        $product_edit = Product::find($id);
        $categories = Category::where('status',1)->get();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        return view('admin.product.create',compact('categories','product_edit','news','total_news'));
    }

    public function update($id,Request $request){
      
        $request->validate([
            'name'          => 'required',
            'price_unit'    => 'required|numeric',
            'price_promotion'=> 'numeric',
        ],[
            'name.required'         => 'Vui lòng nhập tên sản phẩm',
            'price_unit.required'   => 'Vui lòng nhập giá sản phẩm',
            'price_unit.numeric'     => 'Nhập sai định dạng',
            'price_promotion.numeric'=> 'Nhập sai định dạng',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price_unit = $request->price_unit;
        $product->price_promotion = $request->price_promotion;
        $product->description = $request->description;
        $product->status = isset($request->status) ? 1 : 0;
        $product->quantity = isset($request->quantity) ? (int)($request->quantity) : 0;
        $product->cat_id = $request->cat_id;
        $product->top_rate = isset($request->top_rate) ? 1 : 0;
        $product->updated_at = Carbon::now();
        

        // Image()()()
        if($files = $request->file('images')){
            // echo "co update";
            // die();
            //Xoa old Image
            foreach($product->product_image as $pro_image){
                $path_file_old = public_path().'\Uploads/'.$pro_image->image;
                if(file_exists($path_file_old)){
                    unlink($path_file_old);
                }
            }
            // Xoa anh ben table product_image
            $product_images = Product_Image::where('product_id',$product->id)->delete();


            // Cap nhat new Image
            $path = "Uploads/";
            foreach($files as $key => $file){
                $name_file = $file->getClientOriginalName();
                $new_name = current(explode('.',$name_file)).rand(0,100).'.'.$file->getClientOriginalExtension();
                $file->move($path,$new_name);
                if($key == 0){
                    $product->image = $new_name;
                }
                // table product_iamge
                $product_image = new Product_Image();
                $product_image->product_id = $product->id;
                $product_image->image = $new_name;
                $product_image->save();
            }
        }
      
        $product->save();
        return redirect()->route('product.index');
    }

    public function update_top_rate(Request $request){
        $id = $request->id_product;
        $product = Product::find($id);
        $top_rate = $product->top_rate;
        $product->top_rate = ($top_rate == 1) ? 0 : 1;
        dd($product->top_rate);
    }

    public function post_comment(Request $request){
//        return response()->json($request->input());
        $request->validate([
            'content' => 'required'
        ],[
            'content.required' => 'Vui lòng nhập bình luận'
        ]);

        $comment = new CommentPro();
        $comment->user_id = $request->user_id;
        $comment->product_id = $request->product_id;
        $comment->content = trim($request->input('content'));
        $comment->save();

        $news = new News();
        $news->user_id = $request->user_id;
        $news->topic = "comment";
        $news->link = "comment.index";
        $news->created_at =  Carbon::now();
        $news->save();
        return redirect()->back();
//        return response()->json($comment);
    }

    public function delete_comment($id){
//        dd("hello");
        $comment_delete =  CommentPro::find($id);
        $comment_delete->delete();
        return redirect()->back();
    }


    public function edit_comment($id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $comment_edit =  CommentPro::find($id);
        $categories = Category::where('status',1)->get();
//        return response()->json($comment_delete->Product);
        $product_slug = Product::with('product_image')->where('slug',$comment_edit->Product->slug)->first();
        $product_relate = Product::where('cat_id',$product_slug->cat_id)->where('id','<>',$product_slug->id)->get();
        $comments =  CommentPro::where('product_id',$product_slug->id)->with('LoyalCustomer')->get();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();

        return view('fontend.page.product',compact('categories','product_slug','product_relate','comments','comment_edit','news','total_news'));
    }

    public function update_comment($id,Request $request){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $comment_edit = CommentPro::find($id);
        $comment_edit->content = trim($request->input('content'));
        $comment_edit->save();

        $categories = Category::where('status',1)->get();
        $product_slug = Product::with('product_image')->where('slug',$comment_edit->Product->slug)->first();
        $product_relate = Product::where('cat_id',$product_slug->cat_id)->where('id','<>',$product_slug->id)->get();
        $comments =  CommentPro::where('product_id',$product_slug->id)->with('LoyalCustomer')->get();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        return view('fontend.page.product',compact('categories','product_slug','product_relate','comments','news','total_news'));
    }

    public function change_status(){
        $product_id = $_GET['product_id'];
        $data = array();
        $product_edit = Product::find($product_id);
        if($product_edit->status==1){
            $product_edit->status=0;
        }else{
            $product_edit->status=1;
        }
        $product_edit->save();
        $data['product_id'] = $product_id;
        $data['status_number'] = $product_edit->status;
        echo json_encode($data);
    }

    public function search_product(Request $request){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $key = $request->search_key;
        $products = Product::with('product_image','category')->where('name','LIKE',"%{$key}%")->orderBy('updated_at','DESC')->paginate(20);
        $categories = Category::get();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        return view('admin.product.index',compact('products','categories','news','total_news'));
    }

    function filter_by_category(Request $request){
        $cat_id = $request->cat_id;
        $categories = Category::get();
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $products = Product::where('cat_id',$cat_id)->with('product_image','category')->orderBy('updated_at','DESC')->paginate(20);
        // return response()->json($products[0]->category->name);
        $product_quantity = Product::count();
        $news = News::with('User')->with('User_Info')->get();
        $total_news = News::where('status',0)->count();
        return view('admin.product.index',compact('products','product_quantity','categories','news','total_news'));
    }

}
