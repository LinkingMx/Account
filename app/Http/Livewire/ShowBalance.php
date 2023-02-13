<?php

namespace App\Http\Livewire;

use App\Models\Transactions;
use Livewire\Component;

class ShowBalance extends Component
{
    public $balance; 

    public function render()
    {

        $transactions = Transactions::where('user_id', 1)->get();
        $this->balance = $transactions->sum('amount');

        return view('livewire.show-balance', compact('transactions'));
    }
}
