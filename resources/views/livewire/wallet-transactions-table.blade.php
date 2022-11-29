<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row justify-content-start">
                <div class="col-md-4 col-lg-3">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="Search"><x-feathericon-search /></span>
                        <input type="search" class="form-control" wire:model.debounce.500ms="search" placeholder="Search Email, Wallet ID, Reference..." aria-describedby="Search" aria-label="Search">
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <select class="form-select" wire:model="type" id="">
                        <option disabled selected>Transaction Type</option>
                        @foreach(\App\Models\WalletTransaction::TYPES as $t)
                            <option value="{{ $t }}">{{ str($t)->replace('_', ' ') }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>Wallet ID</th>
                        <th>Amount</th>
                        <th>Previous Balance</th>
                        <th>New Balance</th>
                        <th>Reference</th>
                        <th>Type</th>
                        <th>Transaction</th>
                        <th>Info</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($transactions as $transaction)
                        <tr>
                            <td>
                                <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ $transaction->wallet->email }}">
                                    {{ $transaction->wallet->unique_id }}
                                </span>
                            </td>
                            <td><span class="fw-bolder text-success">@money($transaction->amount)</span></td>
                            <td><span class="fw-bolder text-secondary">@money($transaction->prev_balance)</span></td>
                            <td><span class="fw-bolder text-primary">@money($transaction->new_balance)</span></td>
                            <td>{{ $transaction->reference }}</td>
                            <td>
                                <span @class([ 'badge rounded-pill',
                                      'badge-light-success' => $transaction->action == 'CREDIT',
                                      'badge-light-danger' => $transaction->action == 'DEBIT',
                                ])>
                                    {{ $transaction->action }}
                                </span>
                            </td>

                            <td><span class="badge badge-light-primary">{{ str($transaction->type)->replace('_', ' ')}}</span></td>

                            <td>{{ $transaction->info ?? '...' }}</td>

                            <td>{{ $transaction->created_at->format('d/m/Y G:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer pb-0">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>
