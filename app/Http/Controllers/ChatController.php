<?php

namespace App\Http\Controllers;

use App\Events\Client\Chat;
use Illuminate\Support\Facades\Auth;
use App\Events\MyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use App\Models\User;
use App\Models\User_Info;

class ChatController extends Controller
{
    //Client
    function clientIndex()
    {
        if (Auth::id()) {
            $chat_logs = [];
            if (Redis::exists('chat_log_' . Auth::id())) {
                $chat_logs_arr = json_decode(Redis::get('chat_log_' . Auth::id()));
                foreach ($chat_logs_arr as $chat_item) {
                    if ($chat_item->user_id == Auth::id()) {
                        $chat_logs[] = $chat_item;
                    }
                }
                
                $data['status'] = "success";
                $data['chat_logs'] = $chat_logs;
            } 
        } else {
            $data['status'] = "error";
        }

        return response()->json($data);
    }

    // function clientSubmitDemo()
    // {
    //     $data = [
    //         'message' => "Hello shop",
    //         'sent_by' => 'client', //admin sẽ là 'admin'
    //     ];

    //     if(Auth::id()){
    //         if (Redis::exists('chat_log')) {
    //             $log = Redis::get('chat_log');
    //             $arr_log = json_decode($log, true);
    //             array_push($arr_log, $data);
    //             Redis::getSet('chat_log', json_encode($arr_log));
    //         } else {
    //             $log = json_encode(array($data));
    //             Redis::set('chat_log', $log);
    //         }
    //         event(new Chat($data['message']));

    //         echo json_encode(json_decode($log));
    //     }else{
    //         echo [];
    //     }
    // }



    function clientSubmit(Request $request)
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            $data = [
                'role'      => 'client',
                'user_id'   => Auth::id(),
                'user_name' => $user->name,
                'message'   => $request->message,
                'time'      => Carbon::now(),
                'user_detail' => User::with('User_Info')->find(Auth::id()),
                'domain'    => request()->getHost(),
                'status'    => 'success'
            ];
            $auth_id = (string)Auth::id();
            if (Redis::exists('chat_log_' . $auth_id)) {
                $log = Redis::get('chat_log_' . $auth_id);
                $arr_log = json_decode($log, true);
                array_push($arr_log, $data);
                Redis::getSet('chat_log_' . $auth_id, json_encode($arr_log));
            } else { //user chua ton tai
                $log = json_encode(array($data));
                Redis::set('chat_log_' . $auth_id, $log);
                if (Redis::exists('list_user')) {
                    $list_user = Redis::get('list_user');
                    $list_user = json_decode($list_user, true);
                    array_push($list_user, $auth_id);
                    Redis::getSet('list_user',json_encode($list_user));
                } else {
                    $arr = [];
                    array_push($arr,$auth_id);
                    Redis::set('list_user', json_encode($arr));
                }
            }

            event(new Chat($data['role'], $data['user_id'], $data['user_name'], $data['message'], $data['time'], $data['user_detail'], $data['domain']));
            
        } else {
            $data['status'] = "error";
        }

        return response()->json($data);
    }


    //Admin
    function adminIndex()
    {
        echo "admin chat";
    }

    function adminSubmit()
    {
        echo "admin submit";
    }
}
