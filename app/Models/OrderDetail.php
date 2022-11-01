<?php

namespace App\Models;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_detail';
    public $timestamp = false;
    public function Order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
