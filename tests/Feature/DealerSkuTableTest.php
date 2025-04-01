<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Sku;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class DealerSkuTableTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_dealer_only_sees_allowed_skus()
    {
        // Create a dealer who can't sell handguns
        $dealer = User::factory()->create([
            'role' => 'customer',
            'can_sell_handguns' => false,
            'can_sell_nfa_items' => true,
            'is_high_capacity_magazine_allowed' => true,
        ]);

        // Create some SKUs
        Sku::factory()->create(['is_handgun' => true, 'model' => 'Blocked Pistol']);
        Sku::factory()->create(['is_handgun' => false, 'model' => 'Allowed Rifle']);

        // Act as dealer and load Livewire component
        $this->actingAs($dealer);

        Livewire::test('dealer-sku-table')
            ->assertSee('Allowed Rifle')
            ->assertDontSee('Blocked Pistol');
    }
}
