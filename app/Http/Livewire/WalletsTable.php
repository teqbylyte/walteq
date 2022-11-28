<?php

namespace App\Http\Livewire;

use App\Models\Wallet;
use Livewire\Component;

class WalletsTable extends Component
{
    public function render()
    {
        $wallets = Wallet::paginate();

        return view('livewire.wallets-table', compact('wallets'));
    }
}
