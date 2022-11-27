<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WalletTransaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const TYPES = ['FUNDING', 'CHARGE', 'WALLET_TRANSFER', 'BANK_TRANSFER'];

    const ACTION = ['DEBIT', 'CREDIT'];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
