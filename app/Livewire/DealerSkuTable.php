<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sku;
use Illuminate\Support\Facades\Auth;

class DealerSkuTable extends Component
{
        protected function filteredSkus()
    {
        $user = Auth::user();

        return Sku::query()
            ->when(!$user->can_sell_handguns, fn ($q) => $q->where('is_handgun', false))
            ->when(!$user->can_sell_nfa_items, fn ($q) => $q->where('is_nfa_item', false))
            ->when(!$user->is_high_capacity_magazine_allowed, fn ($q) => $q->where('is_high_capacity_magazine', false))
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.dealer-sku-table', [
            'skus' => $this->filteredSkus(),
        ]);
    }
}
