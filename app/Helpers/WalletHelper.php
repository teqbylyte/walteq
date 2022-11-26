<?php

namespace App\Helpers;

use App\Models\Wallet;

class WalletHelper
{
    /**
     * @return string
     */
    public static function generateUniqueId(): string
    {
        start:
        $id = 'WQ' . rand(0,9) . rand(100000, 999999);

        if ( Wallet::whereUniqueId($id)->exists() ) goto start;

        return $id;
    }

}
