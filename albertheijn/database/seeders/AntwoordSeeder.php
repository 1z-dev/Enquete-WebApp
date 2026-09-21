<?php

namespace Database\Seeders;

use App\Models\Antwoord;
use App\Models\Sessie;
use App\Models\Stelling;
use Illuminate\Database\Seeder;

class AntwoordSeeder extends Seeder
{
    public function run(): void
    {
        $sessies = Sessie::all();
        $stellingen = Stelling::all();

        foreach ($sessies as $sessie) {
            // each sessie answers a random subset of stellingen, no duplicates
            foreach ($stellingen->random(rand(3, $stellingen->count())) as $stelling) {
                Antwoord::factory()->create([
                    'sessie_id' => $sessie->id,
                    'stelling_id' => $stelling->id,
                ]);
            }
        }
    }
}