<?php
namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Account::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'voornaam' => 'Test',
                'achternaam' => 'User',
                // Admin login: test@example.com / password
                'wachtwoord_hash' => 'password',
                'aangemaakt_op' => now(),
            ],
        );

        $this->call([
            StellingSeeder::class,
            SessieSeeder::class,
            AntwoordSeeder::class,
        ]);
    }
}