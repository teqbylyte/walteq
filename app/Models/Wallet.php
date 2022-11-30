<?php

namespace App\Models;

use App\Traits\HasWalletMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory, SoftDeletes, HasWalletMethods;

    protected $guarded = ['id', 'unique_id'];

    protected $casts = [
        'balance' => 'float'
    ];

    public function getRouteKeyName(): string
    {
        return 'unique_id';
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function details(): array
    {
        return $this->load(['transactions' => fn($q) => $q->take(20)])
            ->only(['unique_id', 'balance', 'email', 'full_name', 'status', 'transactions']);
    }
}
