<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QualityParameter;

class QualityParameterSeeder extends Seeder
{
    public function run(): void
    {
        QualityParameter::factory(10)->create();
    }
}