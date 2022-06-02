<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index()
    {
        echo "This is your list of users in this application";
    }

    public function details(int $id = 0)
    { //type-hinting(telling it the type of data to be passed)
        echo "This is the details of the user with the id: $id";
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
