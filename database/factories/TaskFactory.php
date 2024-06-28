<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\Priority;
use App\Models\Enums\Status;
use App\Models\User;
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
            'user_id' => User::factory(),
            'priority' => fake()->randomElement(Priority::values()),
            'title' => fake()->words(asText: true),
            'description' => fake()->paragraph(),
        ];
    }

    public function completed(): Factory
    {
        return $this->state(
            fn (array $attributes) => [
                'status' => Status::DONE,
                'completed_at' => fake()->dateTimeBetween('-30 days'),
            ]
        );
    }
}
