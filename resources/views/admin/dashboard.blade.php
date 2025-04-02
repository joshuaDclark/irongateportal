<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="p-6">
        Welcome, {{ Auth::user()->name }} (Admin)
    </div>

    <div class="p-6">
        <livewire:admin-sku-table />
    </div>
</x-app-layout>
