<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        //$this->middleware('auth')->except(['register, login']);
        $this->middleware('auth')->only(['orders','stock']);
    }

    public function register(){

    }

    public function login(){

    }

    public function user(){

    }

    public function stock(){

    }

    public function customers(){

    }

    public function orders(){

    }
}
