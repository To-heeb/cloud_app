<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function about()
    {
        $info = ['title' => 'About Us', 'content' => 'This is just <strong>a little</strong> about who we are'];
        return view('info.about', $info);
    }

    public function contact()
    {
        return view('info.contact', ['title' => 'Danladi Bako']);
    }
    public function services()
    {
        return view('info.services');
    }

    public function team()
    {
        return view('info.team');
    }
}
