<?php

namespace Database\Seeders;

use App\Models\Sessie;
use Illuminate\Database\Seeder;

class SessieSeeder extends Seeder
{
    public function run(): void
    {
        Sessie::factory()->count(3)->create();
    }
}