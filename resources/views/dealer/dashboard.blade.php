<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dealer Dashboard
        </h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div>
            Welcome, {{ Auth::user()->name }} (Dealer)<br>
            Selling Handguns: {{ Auth::user()->can_sell_handguns ? 'Yes' : 'No' }}<br>
            Selling NFA Items: {{ Auth::user()->can_sell_nfa_items ? 'Yes' : 'No' }}
        </div>

        <div>
            <h3 class="text-lg font-bold">Available SKUs</h3>
            {{-- Placeholder for filtered SKUs --}}
            <p>This is where your product list will be filtered by your permissions.</p>
        </div>
    </div>
</x-app-layout>

