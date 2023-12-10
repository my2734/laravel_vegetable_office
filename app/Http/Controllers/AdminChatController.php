<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\User;
use App\Models\User_Info;
use App\Models\News;
use App\Events\Admin\Chat;
use Carbon\Carbon;


class AdminChatController extends Controller
{
    function index(){      
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();
        
        $arr_list_user = [];
        if(Redis::exists('list_user')){
            $list_user = Redis::get('list_user');
            $list_user =  json_decode($list_user);

            foreach($list_user as $user_id){
                $userItem = User::with('User_Info')->find($user_id);
                array_push($arr_list_user, $userItem);
            }
        }
        return view('admin.message.index',compact('arr_list_user','news','total_news'));
    }

    function detail($id){
        $news = News::with('User')->with('User_Info')->where('status', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $total_news = News::where('status', 0)->count();

        $list_message_detail = [];
        if(Redis::exists('chat_log_'.$id)){
            $list_message_detail = Redis::get('chat_log_'.$id);
            $list_message_detail = json_decode($list_message_detail);
        }
        $arr_list_user = [];
        if(Redis::exists('list_user')){
            $list_user = Redis::get('list_user');
            $list_user =  json_decode($list_user);

            foreach($list_user as $user_id){
                $userItem = User::with('User_Info')->find($user_id);
                array_push($arr_list_user, $userItem);
            }
        }
        $userDetail = User::with('User_Info')->find($id);
        return view('admin.message.index',compact('arr_list_user', 'list_message_detail', 'userDetail','news','total_news'));
    }

    function post_message(){
        $data = [
            'role'      => 'admin',
            'user_id'   => $_POST['user_id'],
            'user_name' => 'Admin',
            'message'   => $_POST['message'],
            'time'      => Carbon::now(),
            'user_detail' => null,
            'domain'    => request()->getHost()
        ];

        if(Redis::exists('chat_log_'.$data['user_id'])){
            $log = Redis::get('chat_log_' . $data['user_id']);
            $arr_log = json_decode($log, true);
            array_push($arr_log, $data);
            Redis::getSet('chat_log_' . $data['user_id'], json_encode($arr_log));
        }else{
            $log = json_encode(array($data));
            Redis::set('chat_log_' . $data['user_id'], $log);
        }

        event(new Chat($data['role'], $data['user_id'], $data['user_name'], $data['message'], $data['time'], $data['user_detail'], $data['domain']));
        echo json_encode($data);
    }
}
