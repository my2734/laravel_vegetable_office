<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryOfBlog;
use App\Models\Product;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CategoryOfBlogController extends Controller
{
    public function index(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $category_of_blogs = CategoryOfBlog::orderBy('updated_at','DESC')->get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.category_of_blog.index',compact('category_of_blogs','news','total_news'));
    }

    public function create(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.category_of_blog.create',compact('news','total_news'));
    }

    public function store(Request $request){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $request->validate([
            'name'  => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục'
        ]);
        $category_of_blog = new CategoryOfBlog();
        $category_of_blog->name = $request->name;
        $category_of_blog->slug = Str::slug($request->name);
        $category_of_blog->status = isset($request->status) ? 1 : 0;
        $category_of_blog->created_at = Carbon::now();
        $category_of_blog->updated_at = Carbon::now();
        $category_of_blog->save();
        return redirect()->route('category_of_blog.index');
    }

    public function delete($id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $category_of_blog = CategoryOfBlog::find($id);
        $category_of_blog->delete();
        return redirect()->route('category_of_blog.index');
    }

    public function edit($id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $category_of_blog_edit = CategoryOfBlog::find($id);
        return view('admin.category_of_blog.create',compact('category_of_blog_edit'));
    }
    
    public function update($id,Request $request){
        $request->validate([
            'name'  => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục'
        ]);
        $category_of_blog = CategoryOfBlog::find($id);
        $category_of_blog->name = $request->name;
        $category_of_blog->slug = Str::slug($request->name);
        $category_of_blog->status = isset($request->status) ? 1 : 0;
        $category_of_blog->updated_at = Carbon::now();
        $category_of_blog->save();
        return redirect()->route('category_of_blog.index');
    }

    public function change_status(){
        $categoryofblog_id = $_GET['categoryofblog_id'];
        $data = array();
        $categoryofblog_edit = CategoryOfBlog::find($categoryofblog_id);
        if($categoryofblog_edit->status ==1){
            $categoryofblog_edit->status=0;
        }else{
            $categoryofblog_edit->status=1;
        }
        $categoryofblog_edit->save();
        $data['categoryofblog_id']=$categoryofblog_id;
        $data['status_number'] = $categoryofblog_edit->status;
        echo json_encode($data);
    }
}
