<div class="m-2">
    {{-- In work, do what you enjoy. --}}
    <div class="mb-2 text-center block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <p class="mb-5 tracking-tight text-gray-900 dark:text-white">Welcome: {{ Auth::user()->name }}</p>
        <p class="text-2xl font-bold text-gray-700 dark:text-gray-400">${{ number_format($balance/1000,2,'.',','); }}</p>
        <small>Last balance update: {{ $last_update[0]->date }}</small>
    </div>
    
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        
        @if ( $month == '01' and $year == '2021')
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <span class="font-medium">Info alert!</span> Showing all transactions, use load more button to see next 5 records... 
            </div>
        @else
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <span class="font-medium">Info alert!</span> Showing transactions after 01-{{ $month.'-'.$year}} , use load more button to see next 5 records...
        </div>
        @endif
        
        <div class="flex mb-4">
             
            <div class="w-1/2"><h5 class="mb-6 text-[#6875F5]">Last transactions</h5></div>
           
            <div class="text-right w-1/2 flex">
                <div class="w-1/2">
                   <select id="countries" wire:model="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Month</option>
                    <option value="01">JAN</option>
                    <option value="02">FEB</option>
                    <option value="03">MAR</option>
                    <option value="04">APR</option>
                    <option value="05">MAY</option>
                    <option value="06">JUN</option>
                    <option value="07">JUL</option>
                    <option value="08">AUG</option>
                    <option value="09">SEP</option>
                    <option value="10">OCT</option>
                    <option value="11">NOV</option>
                    <option value="12">DEC</option>
                    </select>
                </div>
                <div class="w-1/2 ml-1">
                    <select id="countries" wire:model="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Year</option>
                    <option value="2021">21</option>
                    <option value="2022">22</option>
                    <option value="2023">23</option>
                    <option value="2024">24</option>
                    <option value="DE">Germany</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="relative overflow-x-auto">
            <table class="table-fixed">
                <tbody>
                    @foreach ( $total_rows = $transactions->where('date', '>=', $year.'-'.$month.'-'.'01')->take($rows) as $item )
                    <tr class="pt-4 mt-4 space-y-2 border-b border-gray-200 dark:border-gray-700">
                        <td class="@if( $item->amount < 0 ) text-sky-500 @else text-green-500 @endif flex p-3 text-sm">
                            <svg class="w-4 h-4 mr-1.5 @if( $item->amount < 0 ) text-sky-500 @else text-green-500 @endif dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <div class="capitalize">{{ ucfirst( $item->subject ) }}</div>
                        </td>
                        <td class="align-top w-1/3 text-sm pt-4 pb-2">
                            ${{ number_format($item->amount/1000,2,'.',','); }}<br>
                            <small class="text-gray-500 text-xs italic">{{ $item->date; }}</small>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table> 
        </div>
        <button wire:click="load" type="button" @if ( $total_rows->count()< $rows ) disabled @endif class="mt-5 px-3 py-2 font-medium text-center text-white bg-[#6875F5] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">@if ( $total_rows->count() < $rows ) No more rows...@else Load more... @endif</button>      
    </div>
</div>
