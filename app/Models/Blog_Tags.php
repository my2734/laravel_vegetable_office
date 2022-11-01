<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Tags extends Model
{
    use HasFactory;
    protected $table = "blog_tags";
    public $timestamps = false;
}
