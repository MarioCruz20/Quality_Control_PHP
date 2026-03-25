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
        //Hace referencia para trabajar con el factory del modelo
        //Factory hereda de ... por eso deja usar create()
        ProductionLine::factory(10)->create();

    }
}
