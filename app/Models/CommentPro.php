<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPro extends Model
{
    use HasFactory;
    protected $table = "comment_pro";
    public $timestamps = true;

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
