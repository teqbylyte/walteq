<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MyResponse;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\WalletTransferRequest;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;

class WalletController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWalletRequest $request
     * @return JsonResponse
     */
    public function store(StoreWalletRequest $request)
    {
        $data = $request->fulfill();

        return MyResponse::success('Wallet created!', $data);
    }

    public function show(Wallet $wallet)
    {
        return MyResponse::success('Wallet details fetched!', $wallet->details());
    }

    public function balance(Wallet $wallet)
    {
        return MyResponse::success('Wallet balance fetched!', $wallet->only(['unique_id', 'balance']));
    }

    public function walletTransfer(WalletTransferRequest $request, Wallet $wallet)
    {
        return $request->fulfil();
    }
}
