<?php

namespace App\Http\Requests;

use App\Helpers\MyResponse;
use App\Models\Wallet;
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
            'receiver_wallet_id'    => 'required|exists:wallets,unique_id',
            'amount'                => 'required|numeric',
            'reference'             => 'required',
            'info'                  => 'nullable',
        ];
    }

    protected function passedValidation()
    {
        $this->sender = $this->wallet;

        $this->receiver = Wallet::whereUniqueId($this->receiver_wallet_id)->first();

        $wallet_check = $this->sender->canPerformTransaction($this->amount);

        abort_unless($wallet_check['success'], 403, $wallet_check['message']);
    }

    public function fulfil(): JsonResponse
    {
        $response = MyResponse::failed('An Error occurred');

        DB::transaction(function () use (&$response) {
            $this->sender->debit($this->amount, 'WALLET_TRANSFER', $this->reference, $this->info);

            $info = "$this->info. From " . $this->sender->full_name ?? $this->sender->email;

            $this->receiver->credit($this->amount, 'WALLET_TRANSFER', $this->reference, $info);

            $response = MyResponse::success('Wallet transfer was successful!');
        });

        return $response;
    }
}