<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = ['id', 'unique_id'];

    protected $casts = [
        'balance' => 'float'
    ];

    public function balance(): Attribute
    {
        return Attribute::get(
            fn($value) => str_contains($value, '.') ? number_format($value, 2) : $value
        );
    }

    public function getRouteKeyName(): string
    {
        return 'unique_id';
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function api(): Wallet
    {
        return $this->select(['unique_id', 'balance', 'email', 'full_name', 'status'])->first();
    }
}
