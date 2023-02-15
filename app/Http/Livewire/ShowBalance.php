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
    public $month;
    public $year;

    public function render()
    {

        $transactions = Transactions::where('user_id', Auth::user()->id)
        ->orderBy('date', 'DESC')
        ->get();

        $this->balance = $transactions->sum('amount');
        $this->last_update = $transactions->take(1);

        return view('livewire.show-balance', compact('transactions'));
    }

    /**
     * Function to increment rows of de pagination or load more
     */
    public function load(){
        $this->rows += 5;
    }

    /**
     * Contructor original del controlador
     */
    public function __construct()
    {
        $this->year = '2021';
        $this->month = '01';
    }
}
