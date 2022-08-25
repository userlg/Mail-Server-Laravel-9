<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'message' => fake()->paragraph(),
            'created_at' =>fake()->dateTimeBetween('-2 year',now()),
            'updated_at' =>fake()->dateTimeBetween('-150 days',now()),
            'senderEmail' =>fake()->safeEmail()
        ];
    }
}
