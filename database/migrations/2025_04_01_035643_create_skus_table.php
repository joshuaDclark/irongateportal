<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->string('upc')->unique();
            $table->string('brand');
            $table->string('model');
            $table->string('type'); // Pistol, Rifle, etc.
            $table->string('caliber');
            $table->string('action');
            $table->decimal('barrel_length', 4, 2)->nullable();
            $table->string('capacity')->nullable();
            $table->boolean('is_nfa_item')->default(false);
            $table->boolean('is_handgun')->default(false);
            $table->boolean('is_high_capacity_magazine')->default(false);
            $table->decimal('msrp', 8, 2);
            $table->timestamps();

             // Performance indexes
            $table->index('is_handgun');
            $table->index('is_nfa_item');
            $table->index('is_high_capacity_magazine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
