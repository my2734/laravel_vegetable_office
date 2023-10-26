<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    function index(){
        return view('admin.message.index');
    }
}
