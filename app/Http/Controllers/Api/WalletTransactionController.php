<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransactionRequest;
use App\Models\Wallet;

class WalletTransactionController extends Controller
{
    public function index(Wallet $wallet)
    {
        return MyResponse::success('Wallet transactions fetched!', $wallet->transactions()->latest()->simplePaginate(75));
    }

    public function store(CreateTransactionRequest $request)
    {
        return MyResponse::success("Wallet {$request->action}ed successfully!", $request->fulfil());
    }
}
