<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dealer Dashboard
        </h2>
    </x-slot>

    <div class="p-6">
        Welcome, {{ Auth::user()->name }} (Test User)
    </div>

    <div class="p-6 space-y-4">
        <div>
            Selling Handguns: {{ Auth::user()->can_sell_handguns ? 'Yes' : 'No' }}<br>
            Selling NFA Items: {{ Auth::user()->can_sell_nfa_items ? 'Yes' : 'No' }}
        </div>
    </div>

    <div class="p-6">
        <livewire:dealer-sku-table />
    </div>
</x-app-layout>

