<?php

namespace Database\Factories;

use App\Models\Sessie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sessie>
 */
class SessieFactory extends Factory
{
    protected $model = Sessie::class;

    public function definition(): array
    {
        $created = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'aangemaakt_op' => $created,
            'sessie_duur' => fake()->optional()->dateTimeBetween($created, '+1 hour'),
            'email' => fake()->optional()->safeEmail(),
            'naam' => fake()->optional()->name(),
            'leeftijd' => fake()->optional()->numberBetween(16, 90),
        ];
    }
}