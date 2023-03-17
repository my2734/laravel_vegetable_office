<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
