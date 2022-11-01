<?php

namespace App\Models;
use App\Models\OrderDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    public $timestamps = false;
    public function OrderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
