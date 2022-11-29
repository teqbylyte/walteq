<?php

namespace App\Http\Livewire;

use App\Models\WalletTransaction;
use Livewire\Component;
use Livewire\WithPagination;

class WalletTransactionsTable extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = ['refresh' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $transactions = WalletTransaction::with('wallet')
            ->where('reference', 'like', '%' . $this->search . '%')
            ->orWhereHas('wallet',
                fn($query) => $query->where('email', 'like', '%' . $this->search . '%')
                    ->orWhere('unique_id', 'like', '%' . $this->search . '%')
            )->latest()->paginate();

        return view('livewire.wallet-transactions-table', compact('transactions'));
    }
}
