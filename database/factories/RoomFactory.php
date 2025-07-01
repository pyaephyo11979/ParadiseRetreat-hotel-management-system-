<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_number' => "A" . $this->faker->unique()->numberBetween(115, 145), // Unique room number
            'room_type' => 'Double',
            'capacity' => 2,
            'price_per_night' => 679.99,
            'is_available' => $this->faker->boolean(80), // 80% chance of being available
            'description' => $this->faker->optional()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
            //
        ];
    }
}
