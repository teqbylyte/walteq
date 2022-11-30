<?php

namespace App\Observers;

use App\Helpers\WalletHelper;
use App\Models\Wallet;

class WalletObserver
{
    /**
     * Handle the Wallet "created" event.
     *
     * @param Wallet $wallet
     * @return void
     */
    public function creating(Wallet $wallet)
    {
        $wallet->unique_id = WalletHelper::generateUniqueId();
        $wallet->balance = 0.0;
        $wallet->status = 'ACTIVE';
    }

    /**
     * Handle the Wallet "updated" event.
     *
     * @param Wallet $wallet
     * @return void
     */
    public function updated(Wallet $wallet)
    {
        //
    }
}
