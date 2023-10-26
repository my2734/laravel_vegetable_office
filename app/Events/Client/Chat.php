<?php

namespace App\Events\Client;

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
    public $message;
    public $time;


    public function __construct($role, $user_id, $message, $time)
    {
        $this->role = $role;
        $this->user_id = $user_id;
        $this->message = $message;
        $this->time = $time;
    }

    public function broadcastOn()
    {
        return ['chat-with-admin'];
    }

    public function broadcastAs()
    {
        return 'chat-with-admin-event';
    }
}
