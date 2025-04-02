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
    $dealer = User::factory()->create([
        'role' => 'customer',
        'can_sell_handguns' => false,
        'can_sell_nfa_items' => false,
        'is_high_capacity_magazine_allowed' => true,
    ]);

    // Should be hidden (handgun)
    Sku::factory()->create([
        'model' => 'Hidden Handgun',
        'is_handgun' => true,
        'is_nfa_item' => false,
    ]);

    // Should be hidden (NFA item)
    Sku::factory()->create([
        'model' => 'Restricted NFA Rifle',
        'is_handgun' => false,
        'is_nfa_item' => true,
    ]);

    // Should be visible
    Sku::factory()->create([
        'model' => 'Visible Rifle',
        'is_handgun' => false,
        'is_nfa_item' => false,
    ]);

    $this->actingAs($dealer);

    Livewire::test('dealer-sku-table')
        ->assertSee('Visible Rifle')
        ->assertDontSee('Hidden Handgun')
        ->assertDontSee('Restricted NFA Rifle');
}

}
