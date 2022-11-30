<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    // home
    public function index()
    {
        $transactions = WalletTransaction::latest()->limit(15)->get();

        $statistics = (object) [
            'wallet_count' => Wallet::count(),
            'transactions_count' => WalletTransaction::count(),
            'avg_daily' => WalletTransaction::whereDate('created_at', today())->count(),
            'income' => WalletTransaction::whereType('CHARGE')->sum('amount'),
        ];

        return view('pages.dashboard', compact('transactions', 'statistics'));
    }
}
