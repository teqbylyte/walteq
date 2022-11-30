<?php

namespace App\Http\Requests;

use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    private Wallet $wallet;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'wallet_id' => 'required|exists:wallets,unique_id',
            'action' => 'required|in:debit,credit',
            'amount'    => 'required|numeric',
            'reference' => 'required|string',
            'info'  => 'nullable',
        ];
    }

    protected function passedValidation()
    {
        $this->wallet = Wallet::whereUniqueId($this->wallet_id)->first();

        $wallet_check = $this->wallet->canPerformTransaction($this->amount);

        abort_unless($wallet_check['success'], 403, $wallet_check['message']);

        $this->wallet->{$this->action}(amount: $this->amount, reference: $this->reference, info: $this->info);
    }

    public function fulfil(): WalletTransaction
    {
        return $this->wallet->transactions()->latest()->first();
    }
}
