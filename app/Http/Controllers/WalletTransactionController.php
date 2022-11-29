<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletTransactionController extends Controller
{
    public function index()
    {
        return view('pages.wallets.transactions');
    }
}
