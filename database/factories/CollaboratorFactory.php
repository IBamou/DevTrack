<?php

namespace Database\Factories;

use App\Models\Collaborator;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Collaborator>
 */
class CollaboratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'project_id' => Project::inRandomOrder()->first()->id,
            'role' => fake()->randomElement(['admin', 'member']), // du kannst das <source media="(min-width: )" srcset="" sizes=""> 'role' => 'member' schreiben,
        ];
    }
}
