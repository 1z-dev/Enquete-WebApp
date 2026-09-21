<?php

namespace Database\Factories;

use App\Models\Stelling;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Stelling>
 */
class StellingFactory extends Factory
{
    protected $model = Stelling::class;

    public function definition(): array
    {
        return [
            'stelling' => fake()->sentence(),
            'context' => fake()->optional()->paragraph(),
            'aangemaakt_op' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}