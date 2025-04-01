<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Sku;
use Faker\Factory as Faker;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 1000) as $i) {
            $type = $faker->randomElement(['Pistol', 'Rifle', 'Shotgun']);
            $isHandgun = $type === 'Pistol';
            $isNfa = $faker->boolean(5);
            $isHighCap = $faker->boolean(30);

            Sku::create([
                'upc' => $faker->unique()->numerify('############'),
                'brand' => $faker->randomElement(['Glock', 'Sig Sauer', 'Beretta']),
                'model' => strtoupper($faker->bothify('Model ###')),
                'type' => $type,
                'caliber' => $faker->randomElement(['9MM', '.45 ACP', '.223 REM']),
                'action' => $faker->randomElement(['Safe Action', 'Single Action']),
                'barrel_length' => $faker->randomFloat(2, 2.5, 6.5),
                'capacity' => $faker->randomElement(['10+1', '15+1', '30+1']),
                'is_nfa_item' => $isNfa,
                'is_handgun' => $isHandgun,
                'is_high_capacity_magazine' => $isHighCap,
                'msrp' => $faker->randomFloat(2, 300, 1200),
            ]);
        }
    }
}
