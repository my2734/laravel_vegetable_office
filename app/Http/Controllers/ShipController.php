<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipController extends Controller
{

    public function index(){
        return view('ship.index');
    }

    public function profile(){
        return view('ship.profile');
    }

    
}
