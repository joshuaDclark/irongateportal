<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'upc',
        'brand',
        'model',
        'type',
        'caliber',
        'action',
        'barrel_length',
        'capacity',
        'is_nfa_item',
        'is_handgun',
        'is_high_capacity_magazine',
        'msrp',
    ];
}
