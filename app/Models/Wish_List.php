<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wish_List extends Model
{
    use HasFactory;
    protected $table = 'wish_list';
    public $timestamps = true;

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
