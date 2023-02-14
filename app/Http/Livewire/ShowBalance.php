<?php

namespace App\Http\Livewire;

use App\Models\Transactions;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowBalance extends Component
{
    public $balance; 
    public $last_update;
    public $rows = 5;
    public $total_rows;

    public function render()
    {

        $transactions = Transactions::where('user_id', Auth::user()->id)
        ->orderBy('date', 'DESC')
        ->get();

        $this->balance = $transactions->sum('amount');
        $this->total_rows = $transactions->count();
        $this->last_update = $transactions->take(1);

        return view('livewire.show-balance', compact('transactions'));
    }

    /**
     * Function to increment rows of de pagination or load more
     */
    public function load(){
        $this->rows += 5;
    }
}
