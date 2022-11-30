<?php

namespace App\Traits;

trait HasWalletMethods
{
    public function isActive(): bool
    {
        return $this->status === 'ACTIVE';
    }

    public function canPerformTransaction(float $amount): array
    {
        if ($this->status !== 'ACTIVE') {
            return [
                'success' => false,
                'message' => "Wallet is {$this->status}"
            ];
        }

        if ($amount > $this->balance) {
            return [
                'success' => false,
                'message' => "Insufficient Fund!"
            ];
        }

        return ['success' => true, 'message' => null];
    }

    public function debit(float $amount, string $reference, string|null $info, string $trans_type = 'OTHERS')
    {
        \DB::transaction(function () use ($amount, $trans_type, $reference, $info) {
            $prev_bal = $this->balance;

            $this->update(['balance' => $prev_bal - $amount]);

            $this->transactions()->create([
                'amount' => $amount,
                'action' => 'DEBIT',
                'reference' => $reference,
                'prev_balance' => $prev_bal,
                'new_balance' => $this->balance,
                'info' => $info,
                'type' => $trans_type,
            ]);
        });
    }

    public function credit(float $amount, string $reference, string|null $info, string $trans_type = 'OTHERS')
    {
        \DB::transaction(function () use ($amount, $trans_type, $reference, $info) {
            $prev_bal = $this->balance;

            $this->update(['balance' => $prev_bal + $amount]);

            $this->transactions()->create([
                'amount' => $amount,
                'action' => 'CREDIT',
                'reference' => $reference,
                'prev_balance' => $prev_bal,
                'new_balance' => $this->balance,
                'info' => $info,
                'type' => $trans_type,
            ]);
        });
    }
}
