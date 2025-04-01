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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('customer');
            $table->boolean('can_sell_handguns')->default(false);
            $table->boolean('can_sell_nfa_items')->default(false);
            $table->boolean('is_high_capacity_magazine_allowed')->default(false);
            $table->string('state_license_number')->nullable();
            $table->date('state_license_expiration')->nullable();
        });
    }
};
