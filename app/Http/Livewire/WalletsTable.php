<?php

namespace App\Http\Livewire;

use App\Models\Wallet;
use Livewire\Component;
use Livewire\WithPagination;

class WalletsTable extends Component
{
    use WithPagination;

    public $search;

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
        $wallets = Wallet::where('full_name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('unique_id', 'like', '%' . $this->search . '%')
            ->latest()->paginate();

        return view('livewire.wallets-table', compact('wallets'));
    }

    public function updateStatus(Wallet $wallet, $status)
    {
        if (in_array($status, ['SUSPENDED', 'INACTIVE', 'ACTIVE'])) {
            $wallet->status = $status;
            $wallet->save();

            $this->dispatchBrowserEvent('flash-msg',
                ['type' => 'success',  'message' => "$wallet->email is now $status"]
            );
        }
    }
}
