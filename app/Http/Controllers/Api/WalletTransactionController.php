<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MyResponse;
use App\Http\Controllers\Controller;
use App\Models\Wallet;

class WalletTransactionController extends Controller
{
    public function index(Wallet $wallet)
    {
        return MyResponse::success('Wallet transactions fetched!', $wallet->transactions);
    }
}
