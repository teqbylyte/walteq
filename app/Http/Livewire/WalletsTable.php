<?php

namespace App\Http\Livewire;

use App\Models\Wallet;
use Livewire\Component;
use Livewire\WithPagination;

class WalletsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $wallets = Wallet::paginate();

        $this->dispatchBrowserEvent('reload-scripts');

        return view('livewire.wallets-table', compact('wallets'));
    }
}
