<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ceremony>
 */
class CeremonyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('ms_MY')->name(),
            'description' => fake('ms_MY')->paragraph(),
            'image_name' => fake('ms_MY')->imageUrl(),
            'start_date' => fake()->dateTime(),
            'end_date' => fake()->dateTime()
        ];
    }
}
