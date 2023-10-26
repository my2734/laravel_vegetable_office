<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\News;
use App\Models\User;

use App\Models\CommentPro;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){
        // $products = Product::with('product_image','category','warehouse')->orderBy('updated_at','DESC')->paginate(20);
        // $product_quantity = Product::count();
        $comments = CommentPro::with('User','Product')->orderBy('updated_at','DESC')->get();
        $news = News::with('User')->with('User_Info')->where('status',0)->orderBy('created_at','DESC')->take(6)->get();
        $total_news = News::where('status',0)->count();
        return view('admin.comment.index',compact('comments','news','total_news'));
    }

    public function change_status(){
        $comment_id = $_GET['comment_id'];
        $comment = CommentPro::find($comment_id);
        $comment->status = $comment->status==1 ? 0 : 1;
        $comment->save();
        $data = array();
        $data['id'] = $comment_id;
        $data['status'] = $comment->status;
        return json_encode($data);
    }

    public function reply_comment(){
        $comment_id = $_GET['comment_id'];
        $reply = $_GET['reply'];
        $comment = CommentPro::find($comment_id);
        $comment->reply = $reply;
        $comment->status = 1;
        $comment->save();

        $data['id'] = $comment_id;
        $data['status'] = $comment->status;
        return json_encode($data);
    }

    public function delete_comment(){
        $comment_id = $_GET['comment_id'];
        CommentPro::find($comment_id)->delete();
        $data['id'] = $comment_id;
        return json_encode($data);
    }
}
