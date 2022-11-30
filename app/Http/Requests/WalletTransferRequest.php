<?php

namespace App\Http\Requests;

use App\Helpers\MyResponse;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class WalletTransferRequest extends FormRequest
{
    private Wallet $sender;

    private Wallet $receiver;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'sender_wallet_id'      => 'required|exists:wallets,unique_id',
            'receiver_wallet_id'    => 'required|exists:wallets,unique_id',
            'amount'                => 'required|numeric',
            'reference'             => 'required',
            'info'                  => 'nullable',
        ];
    }

    protected function passedValidation()
    {
        $this->sender = Wallet::whereUniqueId($this->sender_wallet_id)->first();

        $this->receiver = Wallet::whereUniqueId($this->receiver_wallet_id)->first();

        abort_if($this->sender->is($this->receiver), 403, 'Unauthorized as sender is also receiver');

        $wallet_check = $this->sender->canPerformTransaction($this->amount);

        abort_unless($wallet_check['success'], 403, $wallet_check['message']);

        DB::transaction(function () use (&$response) {
            $this->sender->debit($this->amount, $this->reference, $this->info, 'WALLET_TRANSFER');

            $info = "$this->info. From " . $this->sender->full_name ?? $this->sender->email;

            $this->receiver->credit($this->amount, $this->reference, $info, 'WALLET_TRANSFER');
        });
    }

    public function fulfil(): WalletTransaction
    {
        return  $this->sender->transactions()->latest()->first();
    }
}
