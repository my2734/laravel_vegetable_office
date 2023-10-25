<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('updated_at','DESC')->get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.category.index',compact('categories','news','total_news'));
    }

    public function create(){
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.category.create',compact('news','total_news'));
    }
    
    public function store(Request $request){
        $request->validate([
            'name'  => 'required',
            'images' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục',
            'images.required' => 'Vui lòng nhập ảnh danh mục'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = isset($request->status)?1:0;
        $category->created_at = Carbon::now();
        $category->updated_at = Carbon::now();
        $category->image = "";
        
       
        if( $file = $request->file('images')){
            $path = 'Uploads/';
            $file_name = $file->getClientOriginalName();
            $new_file = current(explode('.',$file_name)).rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_file);
            $category->image = $new_file;
        }
        $category->save();
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        return redirect()->route('category.index');
    }


    public function delete($id){
        
        $category = Category::find($id);
        $file_name = $category->image;
       
        $path_file = public_path().'\Uploads/'.$file_name;
        if(file_exists($path_file)){
            unlink($path_file);
        }
        // Xoa san pham co danh muc can xoa
        $product = Product::where('cat_id',$category->id)->delete();
        $category->delete();
        return redirect()->back();
    }

    public function edit($id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $category_edit = Category::find($id);
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.category.create',compact('category_edit','news','total_news'));
    }

    public function update(Request $request, $id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $request->validate([
            'name'  => 'required',
            'images' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục',
            'images.required' => 'Vui lòng nhập ảnh danh mục'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = isset($request->status) ? 1 : 0;
        $category->updated_at = Carbon::now(); 
        
        
        $file = $request->file('image');
        $path = 'Uploads/';
        if($file){
            // Xoa anh cu
            if(isset($category->image)){
                $path_old_image = public_path().'\Uploads/'.$category->image;
                unlink($path_old_image);
            }

            // Cap nhat anh moi
            $file_name = $file->getClientOriginalName();
            $new_file = current(explode('.',$file_name)).rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_file);
            $category->image = $new_file;
        }
        $category->save();
        return redirect()->route('category.index');
    }

    public function change_status(){
        $category_id = $_GET['category_id'];
        $data = array();
        $category_edit = Category::find($category_id);
        if($category_edit->status==1){
            $category_edit->status=0;
        }else{
            $category_edit->status=1;
        }
        $category_edit->save();
        $data['category_id'] = $category_id;
        $data['status_number'] = $category_edit->status;
        echo json_encode($data);
    }
}
