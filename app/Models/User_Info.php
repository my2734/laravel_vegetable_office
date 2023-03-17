<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class User_Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
    ];
    public $timestamps = false;
    protected $table = 'user_info';

    public function User(){
        return $this->belongsTo(User::class);
    }
}
