<?php

namespace Database\Factories;

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
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(1),
            'status' => fake()->randomElement(['todo', 'in_progress', 'review', 'done']),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'due_date' => fake()->boolean(70) ? fake()->dateTimeBetween('now', '+1 month') : null,
            'project_id' => Project::factory(),
            'collaborator_id' => null,
            'created_by' => fn(array $attrs) => Project::find($attrs['project_id'])?->created_by ?? User::factory(),
        ];
    }
}
