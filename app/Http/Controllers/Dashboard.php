<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    // home
    public function index()
    {
        return view('pages.dashboard');
    }
}
