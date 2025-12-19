<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->optional()->paragraph(),
            'completed_at' => $this->faker->optional(0.3)->dateTimeBetween('-5 days', 'now'),
            'due_date' => $this->faker->optional()->dateTimeBetween('-2 days', '+5 days'),
            'is_recurring' => false
        ];
    }
}
