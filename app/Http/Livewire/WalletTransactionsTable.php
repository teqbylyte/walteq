<?php

namespace App\Http\Livewire;

use App\Models\WalletTransaction;
use Livewire\Component;
use Livewire\WithPagination;

class WalletTransactionsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $type = '';

    protected $listeners = ['refresh' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'type' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (empty($this->search ) && empty($this->type)) {
            $transactions = WalletTransaction::with('wallet')->paginate();
        }
        else {
            $transactions = WalletTransaction::with('wallet')
                ->where(function ($query) {
                    $query->where('reference', 'like', '%' . $this->search . '%')
                        ->orWhereHas('wallet',
                            fn($query) => $query->where('email', 'like', '%' . $this->search . '%')
                                ->orWhere('unique_id', 'like', '%' . $this->search . '%')
                        );
                })->whereType($this->type)->latest()->paginate();
        }

        return view('livewire.wallet-transactions-table', compact('transactions'));
    }
}
