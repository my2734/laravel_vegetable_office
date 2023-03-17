<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CommentPro extends Model
{
    use HasFactory;
    protected $table = "comment_pro";
    // public $timestamps = true;

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    // public function category(){
    //     return $this->belongsTo(Category::class,'cat_id','id');
    // }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
