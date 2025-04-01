<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sku>
 */
class SkuFactory extends Factory
{
    protected $model = \App\Models\Sku::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['Pistol', 'Rifle', 'Shotgun']);
        $isHandgun = $type === 'Pistol';
        $isNfa = $this->faker->boolean(5);
        $isHighCap = $this->faker->boolean(30);

        return [
            'upc' => $this->faker->unique()->numerify('############'),
            'brand' => $this->faker->randomElement(['Glock', 'Sig Sauer', 'Beretta']),
            'model' => strtoupper($this->faker->bothify('Model ###')),
            'type' => $type,
            'caliber' => $this->faker->randomElement(['9MM', '.45 ACP', '.223 REM']),
            'action' => $this->faker->randomElement(['Safe Action', 'Single Action']),
            'barrel_length' => $this->faker->randomFloat(2, 2.5, 6.5),
            'capacity' => $this->faker->randomElement(['10+1', '15+1', '30+1']),
            'is_nfa_item' => $isNfa,
            'is_handgun' => $isHandgun,
            'is_high_capacity_magazine' => $isHighCap,
            'msrp' => $this->faker->randomFloat(2, 300, 1200),
        ];
    }
}
