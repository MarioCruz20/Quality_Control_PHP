<?php

namespace Database\Seeders;

use App\Models\ProductionLine;
use Illuminate\Database\Seeder;

class ProductionLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductionLine::factory(2)->create();
    }
}
