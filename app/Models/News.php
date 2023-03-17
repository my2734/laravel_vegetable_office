<?php

namespace App\Models;
use App\Models\User;
use App\Models\User_Info;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'news';

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function User_Info(){
        return $this->belongsTo(User_Info::class,'user_id','user_id');
    }
}
