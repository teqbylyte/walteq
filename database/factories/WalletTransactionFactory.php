<?php

namespace Database\Factories;

use App\Models\WalletTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WalletTransaction>
 */
class WalletTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'wallet_id' => rand(1, 30),
            'action' => WalletTransaction::ACTION[rand(0,1)],
            'reference' => Str::random(9),
            'new_balance' => fake()->randomFloat(2, 1000, 99999),
            'prev_balance' => fake()->randomFloat(2, 1000, 99999),
            'amount' => fake()->randomFloat(2, 1000, 99999),
            'info' => fake()->sentence(),
            'type' => WalletTransaction::TYPES[rand(0, 3)]
        ];
    }
}
