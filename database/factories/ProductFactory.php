<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'created' => now(),
            'createdby' => 0,
            'updated' => now(),
            'isactive' => fake()->randomElement(['Y','N']),
            'name' => fake()->words(2, true),
            'code' => fake()->unique()->bothify('PRD-####'),
            'picture' => null,
            'production_line_id' => 1
        ];
    }
}