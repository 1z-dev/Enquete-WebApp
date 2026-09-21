<?php

namespace Database\Factories;

use App\Models\Sessie;
use App\Models\Stelling;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Antwoord>
 */
class AntwoordFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sessie_id' => Sessie::factory(),
            'stelling_id' => Stelling::factory(),
            'eens' => fake()->randomElement(['eens', 'oneens']),
            'uitleg' => fake()->optional()->sentence(),
            'beantwoord_op' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}