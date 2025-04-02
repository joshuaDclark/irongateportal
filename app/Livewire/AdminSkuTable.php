<?php

namespace App\Livewire;

use \App\Models\Sku;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSkuTable extends Component
{
    protected function allSkus()
    {
        return Sku::query()->paginate(15);
    }

    public function render()
    {
        return view('livewire.admin-sku-table', [
            'skus' => $this->allSkus(),
        ]);
    }
}