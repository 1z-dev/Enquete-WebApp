<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Het wachtwoord dat de factory gebruikt (standaard: "password").
     */
    protected static ?string $password;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voornaam' => fake()->firstName(),
            'achternaam' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'wachtwoord_hash' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'aangemaakt_op' => now(),
        ];
    }
}
