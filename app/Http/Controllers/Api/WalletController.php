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

        return MyResponse::success('Wallet created', $data);
    }

    public function walletTransfer(WalletTransferRequest $request, Wallet $wallet)
    {
        return $request->fulfil();
    }
}