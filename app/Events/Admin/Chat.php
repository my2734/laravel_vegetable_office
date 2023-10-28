<?php

namespace App\Events\Admin;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Chat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $role;
    public $user_id;
    public $user_name;
    public $message;
    public $time;
    public $user_detail;
    public $domain;


    public function __construct($role, $user_id, $user_name, $message, $time,$user_detail, $domain)
    {
        $this->role = $role;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->message = $message;
        $this->time = $time;
        $this->user_detail = $user_detail;
        $this->domain = $domain;
    }

    public function broadcastOn()
    {
        return ['chat-with-client'];
    }

    public function broadcastAs()
    {
        return 'chat-with-client-event';
    }
}
