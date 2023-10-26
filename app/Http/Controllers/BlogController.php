<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tags;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Blog_Tags;
use App\Models\News;
use App\Models\CategoryOfBlog;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::with('category_of_blog','tagses')->orderBy('updated_at','DESC')->paginate(4);
        // echo json_encode(Blog::count());
        // die();
        // return response()->json($blogs);
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        
        return view('admin.blog.index',compact('blogs','news','total_news'));
    }

    public function create(){
        $category_of_blogs = CategoryOfBlog::get();
        $tagses = Tags::get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.blog.create',compact('category_of_blogs','tagses','news','total_news'));
    }

    public function store(Request $request){
        $request->validate([
            'title'     => 'required',
            'image'     => 'required',
            'cat_id'    => 'required',
            'detail_header'=> 'required',
            'detail_footer'=> 'required'
        ],[
            'title.required'    => 'Vui lòng nhập tên Blog',
            'image.required'    => 'Vui lòng thêm ảnh Blog',
            'cat_id'            => 'Vui lòng chọn danh mục',
            'detail_header.required'     => 'Vui lòng nhập mô tả',
            'detail_footer.required'     => 'Vui lòng nhập mô tả'
        ]);

        $blog = new Blog();
        $blog->cat_id = $request->cat_id;
        $blog->title = $request->title;
        $blog->slug =  Str::slug($request->title);
        $blog->detail_header = $request->detail_header;
        $blog->detail_footer = $request->detail_footer;
        $blog->image = "";
        $blog->created_at = Carbon::now();
        $blog->updated_at = Carbon::now();

        if($file = $request->file('image')){
            $path = 'Uploads/';
            $file_name = $file->getClientOriginalName();
            $new_name = current(explode('.',$file_name)).rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_name);
            $blog->image = $new_name;
        }
        $data = $request->tags_id;
        $blog->tags_id = $data[0];
       
        // Them nhieu tags cho blog
        $blog->save();
        $blog->tagses()->attach($data);
        // return response()->json($blog);
        
        return redirect()->route('blog.index');
    }

    public function delete($id){
        $blog = Blog::find($id);
        // Xoa record bang lien ket
        $blog->tagses()->detach();
        // Xoa anh trong Uploads
        $path_image = public_path().'\Uploads/'.$blog->image;
        if(file_exists($path_image)){
            unlink($path_image);
        }
        $blog->delete();
        return redirect()->back();
    }

    public function edit($id){
        $category_of_blogs = CategoryOfBlog::get();
        $tagses = Tags::get();
        $blog_edit = Blog::with('category_of_blog','tagses')->find($id);
        $tags_of_blog = $blog_edit->tagses;
        //   return response()->json($tags_of_blog);
        // if($tags_of_blog->contains(3)){
        //     echo "Ton tai";
        // }
        // return response()->json($blog_edit);
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.blog.create',compact('category_of_blogs','tagses','blog_edit','tags_of_blog','news','total_news'));
    }

    public function update($id, Request $request){
        $request->validate([
            'title'     => 'required',
            'cat_id'    => 'required',
            'detail_header'=> 'required',
            'detail_footer'=> 'required'
        ],[
            'title.required'    => 'Vui lòng nhập tên Blog',
            'cat_id'            => 'Vui lòng chọn danh mục',
            'detail_header'     => 'Vui lòng nhập mô tả',
            'detail_footer'     => 'Vui lòng nhập mô tả'
        ]);
        $blog = Blog::with('tagses')->find($id);
        $blog->cat_id = $request->cat_id;
        $blog->title = $request->title;
        $blog->slug =  Str::slug($request->title);
        $blog->detail_header = $request->detail_header;
        $blog->detail_footer = $request->detail_footer;
        $blog->updated_at = Carbon::now();

        if($file = $request->file('image')){
            // Xoa anh cu
            $path_old_image = public_path().'\Uploads/'.$blog->image;
            if(file_exists($path_old_image)){
                unlink($path_old_image);
            }

            $path = 'Uploads/';
            $file_name = $file->getClientOriginalName();
            $new_name = current(explode('.',$file_name)).rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_name);
            $blog->image = $new_name;
        }

        $data = $request->tags_id;
        $blog->tags_id = $data[0];
       
        // Them nhieu tags cho blog
        $blog->save();
        $blog->tagses()->sync($data);
        
        return redirect()->route('blog.index');
    }
}
