<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profit Balance
        </h2>
        Hola: {{ Auth::user()->name.' '.Auth::user()->id; }}
    </x-slot> 
</x-app-layout>
