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
        'search' => ['except' => '', 'as' => 's'],
        'type' => ['except' => '', 'as' => 't'],
        'page' => ['except' => 1, 'as' => 'p']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingType()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (empty($this->search ) && empty($this->type)) {
            $transactions = WalletTransaction::with('wallet')->paginate();
        }
        elseif (!empty($this->search) && empty($this->type)) {
            $transactions = WalletTransaction::with('wallet')
                ->withSearch($this->search)->latest()->paginate();
        }
        else {
            $transactions = WalletTransaction::with('wallet')
                ->withSearch($this->search)->whereType($this->type)->latest()->paginate();
        }

        return view('livewire.wallet-transactions-table', compact('transactions'));
    }
}
