<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductionLine>
 */
class ProductionLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created' => now(), 
            'createdby' => 0,
            'updated' => now(),
            'updatedby' => 0,
            'isactive' => fake()->randomElement(['Y', 'N']),
            'name' => fake()->words(2, true),
            'description' => fake()->unique()->bothify('LINE-####')
        ];
    }
}
