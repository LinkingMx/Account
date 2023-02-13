<div class="m-2">
    {{-- In work, do what you enjoy. --}}
    

    <a href="#" class="mb-2 text-center block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <p class="mb-5 tracking-tight text-gray-900 dark:text-white">Welcome: {{ Auth::user()->name }}</p>
        <p class="text-2xl font-bold text-gray-700 dark:text-gray-400">${{ number_format($balance,2,'.',','); }}</p>
        <small>last balance update: {{ date("Y-m-d") }}</small>
    </a>

    <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-6">Ultimos movimientos</h5>

        <div class="relative overflow-x-auto">
            <table class="table-fixed">
                <tbody>
                    @foreach ($transactions as $item)
                    <tr class="pt-4 mt-4 space-y-2 border-b border-gray-200 dark:border-gray-700">
                        <td class="@if( $item->amount < 0 ) text-sky-500 @else text-green-500 @endif flex p-3 text-sm">
                            <svg class="w-4 h-4 mr-1.5 @if( $item->amount < 0 ) text-sky-500 @else text-green-500 @endif dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            {{ ucfirst( $item->subject ) }}</td>
                        <td class="align-top w-1/3 text-sm pt-4">${{ number_format($item->amount,2,'.',','); }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table> 
        </div>
    </a>


</div>
