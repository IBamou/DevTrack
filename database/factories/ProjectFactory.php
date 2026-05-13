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
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(1),
            'created_by' => User::factory(),
            'due_date' => fake()->boolean(70) ? fake()->dateTimeBetween('now', '+1 month') : null,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Project $project) {
            $project->collaborators()->attach($project->created_by, ['role' => 'admin']);
        });
    }
}
