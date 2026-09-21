<?php

namespace Database\Seeders;

use App\Models\Stelling;
use Illuminate\Database\Seeder;

class StellingSeeder extends Seeder
{
    public function run(): void
    {
        Stelling::factory()->count(3)->create();
    }
}