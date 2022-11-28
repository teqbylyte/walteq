<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    // home
    public function home()
    {
        return view('pages.dashboard');
    }
}
