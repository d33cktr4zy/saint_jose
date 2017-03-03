<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
        //

        return view('home');
    }
}
