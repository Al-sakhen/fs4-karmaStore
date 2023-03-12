<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function signin(){
        return view('front.auth.signin');
    }
    public function signup(){
        return view('front.auth.signup');
    }
}
