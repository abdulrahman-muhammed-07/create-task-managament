<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->unique()->safeEmail(),
            'assigned_to_id' => function () {
                return User::factory()->create(['type' => User::USER])->id;
            },
            'assigned_by_id' => function () {
                return User::factory()->create(['type' => User::ADMIN])->id;
            }
        ];
    }
}
