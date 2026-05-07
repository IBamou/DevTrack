<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(0.5),
            'description' => fake()->paragraph(0.5),
            'created_by' => User::inRandomOrder()->first()->id,
            'due_date' => fake()->boolean(70) ? fake()->dateTimeBetween('now', '+1 month') : null,
        ];
    }
}
