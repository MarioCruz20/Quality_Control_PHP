<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\QualityParameter;

class QualityParameterFactory extends Factory
{
    protected $model = QualityParameter::class;

    public function definition(): array
    {
        return [
            'created' => now(),
            'createdby' => 0,
            'updated' => now(),
            'isactive' => 'Y',

            'min_moisture' => fake()->randomFloat(2, 1, 2),
            'max_moisture' => fake()->randomFloat(2, 3, 4),

            'min_temperature' => fake()->numberBetween(140,160),
            'max_temperature' => fake()->numberBetween(180,200),

            'min_sodium' => fake()->numberBetween(80,120),
            'max_sodium' => fake()->numberBetween(300,500),

            'min_protein' => fake()->numberBetween(1,3),
            'max_protein' => fake()->numberBetween(4,8),

            'product_id' => fake()->numberBetween(1,10)
        ];
    }
}