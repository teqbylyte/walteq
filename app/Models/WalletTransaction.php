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

    public function scopeWithSearch($query, $search)
    {
        $query->where(function ($query) use ($search) {
            $query->where('reference', 'like', '%' . $search . '%')
                ->orWhereHas('wallet',
                    fn($query) => $query->where('email', 'like', '%' . $search . '%')
                        ->orWhere('unique_id', 'like', '%' . $search . '%')
                );
        });
    }
}
