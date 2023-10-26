<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tags;
use App\Models\Product;
use App\Models\News;
use Carbon\Carbon;

class TagsController extends Controller
{
    public function index(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $tagses = Tags::orderBy('updated_at',"DESC")->get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.tags.index',compact('tagses','news','total_news'));
    }

    public function create(){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.tags.create',compact('news','total_news'));
    }

    public function store(Request $request){
        $request->validate([
            'name'  => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên Tag'
        ]);
        $tags = new Tags();
        $tags->slug = Str::slug($request->name);
        $tags->name = $request->name;
        $tags->status = isset($request->status) ? $request->status : 0;
        $tags->created_at = Carbon::now();
        $tags->updated_at = Carbon::now();

        $tags->save();
        return redirect()->route('tags.index');
    }

    public function delete($id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        Tags::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $products = Product::with('product_image','category')->orderBy('updated_at','DESC')->get();
        $tags_edit = Tags::find($id);
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.tags.create',compact('tags_edit','news','total_news'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name'  => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên Tag'
        ]);
        $tags = Tags::find($id);
        $tags->slug = Str::slug($request->name);
        $tags->name = $request->name;
        $tags->status = isset($request->status) ? $request->status : 0;
        $tags->updated_at = Carbon::now();
        $tags->save();
        return redirect()->route('tags.index');
    }

    public function change_status(){
        $tags_id = $_GET['tags_id'];
        $tags_edit = Tags::find($tags_id);
        if($tags_edit->status==1){
            $tags_edit->status=0;
        }else{
            $tags_edit->status=1;
        }
        $tags_edit->save();
        $data = array();
        $data['tags_id'] = $tags_edit->id;
        $data['status_number'] = $tags_edit->status;
        echo json_encode($data);
    }
}
