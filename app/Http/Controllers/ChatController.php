<?php

namespace App\Http\Controllers;

use App\Events\Client\Chat;
use App\Events\MyEvent;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class ChatController extends Controller
{
    //Client
    function clientIndex()
    {
        if (Auth::id()) {
            $chat_logs = [];
            if (Redis::exists('chat_log')) {
                $chat_logs_arr = json_decode(Redis::get('chat_log'));
                foreach ($chat_logs_arr as $chat_item) {
                    if($chat_item->user_id == Auth::id()){
                        $chat_logs[] = $chat_item;
                    }
                }
                $chat_logs = json_encode($chat_logs);
            } else {
                $chat_logs = null;
            }
            echo $chat_logs;
        } else {
            echo json_encode([]);
        }
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
            $data = [
                'role'      => 'client',
                'user_id'   => Auth::id(),
                'message'   => $request->message,
                'time'      => Carbon::now(),
            ];
            if (Redis::exists('chat_log')) {
                $log = Redis::get('chat_log');
                $arr_log = json_decode($log, true);
                array_push($arr_log, $data);
                Redis::getSet('chat_log', json_encode($arr_log));
            } else {
                $log = json_encode(array($data));
                Redis::set('chat_log', $log);
            }

            event(new Chat($data['role'], $data['user_id'], $data['message'], $data['time']));
        } else {
            return "Chua dang nhap. Vui long dang nhap";
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
