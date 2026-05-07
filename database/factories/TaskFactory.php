<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Task>
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
            'title' => fake()->sentence(1),
            'description' => fake()->paragraph(1),
            'status' => fake()->randomElement(['todo', 'in_progress', 'review', 'done']),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'due_date' => fake()->boolean(70) ? fake()->dateTimeBetween('now', '+1 month') : null,
            'project_id' => Project::inRandomOrder()->first()->id,
            'collaborator_id' => null,
            'created_by' => User::inRandomOrder()->first()->id,
        ];
    }
}
