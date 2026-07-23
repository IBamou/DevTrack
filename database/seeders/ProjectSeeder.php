<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $ilyas = User::where('email', 'ilyas@gmail.com')->first();
        $ahmed = User::where('email', 'ahmed@gmail.com')->first();

        // Ilyas's projects
        $p1 = Project::create([
            'title' => 'Website Redesign',
            'prefix' => 'WEB',
            'description' => 'Complete redesign of the company marketing website with modern UI/UX patterns and improved performance.',
            'created_by' => $ilyas->id,
            'due_date' => now()->addDays(21),
        ]);
        $p1->collaborators()->attach($ilyas->id, ['role' => 'admin']);
        $p1->collaborators()->attach($ahmed->id, ['role' => 'member']);

        $p2 = Project::create([
            'title' => 'Mobile App MVP',
            'prefix' => 'APP',
            'description' => 'Build the first version of our mobile application for iOS and Android using React Native.',
            'created_by' => $ilyas->id,
            'due_date' => now()->addDays(45),
        ]);
        $p2->collaborators()->attach($ilyas->id, ['role' => 'admin']);

        $p3 = Project::create([
            'title' => 'API Integration',
            'prefix' => 'API',
            'description' => 'Integrate third-party payment gateway and shipping APIs into the e-commerce platform.',
            'created_by' => $ilyas->id,
            'due_date' => now()->addDays(14),
        ]);
        $p3->collaborators()->attach($ilyas->id, ['role' => 'admin']);
        $p3->collaborators()->attach($ahmed->id, ['role' => 'member']);

        // Ahmed's projects
        $p4 = Project::create([
            'title' => 'Dashboard Analytics',
            'prefix' => 'DASH',
            'description' => 'Build an analytics dashboard with real-time charts, metrics, and export capabilities.',
            'created_by' => $ahmed->id,
            'due_date' => now()->addDays(30),
        ]);
        $p4->collaborators()->attach($ahmed->id, ['role' => 'admin']);
        $p4->collaborators()->attach($ilyas->id, ['role' => 'member']);

        $p5 = Project::create([
            'title' => 'User Authentication System',
            'prefix' => 'AUTH',
            'description' => 'Implement secure authentication with OAuth, 2FA, and role-based access control.',
            'created_by' => $ahmed->id,
            'due_date' => now()->subDays(3),
        ]);
        $p5->collaborators()->attach($ahmed->id, ['role' => 'admin']);

        // Tasks for Website Redesign
        $tasks = [
            ['title' => 'Design homepage mockup', 'status' => 'done', 'priority' => 'high', 'project_id' => $p1->id, 'due_date' => now()->subDays(5)],
            ['title' => 'Create component library', 'status' => 'done', 'priority' => 'high', 'project_id' => $p1->id, 'due_date' => now()->subDays(2)],
            ['title' => 'Implement responsive navbar', 'status' => 'in_progress', 'priority' => 'medium', 'project_id' => $p1->id, 'due_date' => now()->addDays(3)],
            ['title' => 'Build hero section', 'status' => 'in_progress', 'priority' => 'high', 'project_id' => $p1->id, 'due_date' => now()->addDays(2)],
            ['title' => 'Create about page', 'status' => 'todo', 'priority' => 'low', 'project_id' => $p1->id, 'due_date' => now()->addDays(10)],
            ['title' => 'Set up contact form', 'status' => 'todo', 'priority' => 'medium', 'project_id' => $p1->id, 'due_date' => now()->addDays(12)],
            ['title' => 'Optimize images', 'status' => 'review', 'priority' => 'medium', 'project_id' => $p1->id, 'due_date' => now()->addDays(5)],
            ['title' => 'Add SEO meta tags', 'status' => 'todo', 'priority' => 'low', 'project_id' => $p1->id, 'due_date' => now()->addDays(15)],

            // Tasks for Mobile App MVP
            ['title' => 'Set up React Native project', 'status' => 'done', 'priority' => 'high', 'project_id' => $p2->id, 'due_date' => now()->subDays(10)],
            ['title' => 'Design app navigation flow', 'status' => 'done', 'priority' => 'high', 'project_id' => $p2->id, 'due_date' => now()->subDays(7)],
            ['title' => 'Implement login screen', 'status' => 'in_progress', 'priority' => 'high', 'project_id' => $p2->id, 'due_date' => now()->addDays(5)],
            ['title' => 'Build home feed', 'status' => 'todo', 'priority' => 'medium', 'project_id' => $p2->id, 'due_date' => now()->addDays(15)],
            ['title' => 'Add push notifications', 'status' => 'todo', 'priority' => 'low', 'project_id' => $p2->id, 'due_date' => now()->addDays(25)],

            // Tasks for API Integration
            ['title' => 'Research payment providers', 'status' => 'done', 'priority' => 'high', 'project_id' => $p3->id, 'due_date' => now()->subDays(8)],
            ['title' => 'Implement Stripe integration', 'status' => 'in_progress', 'priority' => 'high', 'project_id' => $p3->id, 'due_date' => now()->addDays(2)],
            ['title' => 'Add PayPal support', 'status' => 'todo', 'priority' => 'medium', 'project_id' => $p3->id, 'due_date' => now()->addDays(7)],
            ['title' => 'Integrate shipping API', 'status' => 'review', 'priority' => 'medium', 'project_id' => $p3->id, 'due_date' => now()->addDays(4)],
            ['title' => 'Write API documentation', 'status' => 'todo', 'priority' => 'low', 'project_id' => $p3->id, 'due_date' => now()->addDays(10)],

            // Tasks for Dashboard Analytics
            ['title' => 'Design dashboard layout', 'status' => 'done', 'priority' => 'high', 'project_id' => $p4->id, 'due_date' => now()->subDays(6)],
            ['title' => 'Implement chart components', 'status' => 'in_progress', 'priority' => 'high', 'project_id' => $p4->id, 'due_date' => now()->addDays(4)],
            ['title' => 'Add real-time data updates', 'status' => 'todo', 'priority' => 'medium', 'project_id' => $p4->id, 'due_date' => now()->addDays(12)],
            ['title' => 'Create export functionality', 'status' => 'todo', 'priority' => 'low', 'project_id' => $p4->id, 'due_date' => now()->addDays(20)],
            ['title' => 'Add date range filters', 'status' => 'todo', 'priority' => 'medium', 'project_id' => $p4->id, 'due_date' => now()->addDays(8)],

            // Tasks for Auth System
            ['title' => 'Implement OAuth login', 'status' => 'done', 'priority' => 'high', 'project_id' => $p5->id, 'due_date' => now()->subDays(10)],
            ['title' => 'Add two-factor auth', 'status' => 'done', 'priority' => 'high', 'project_id' => $p5->id, 'due_date' => now()->subDays(5)],
            ['title' => 'Build role management', 'status' => 'in_progress', 'priority' => 'medium', 'project_id' => $p5->id, 'due_date' => now()->subDays(1)],
            ['title' => 'Create admin panel', 'status' => 'review', 'priority' => 'high', 'project_id' => $p5->id, 'due_date' => now()->addDays(1)],
        ];

        $collaborators = [
            $ilyas->id => $ilyas,
            $ahmed->id => $ahmed,
        ];

        foreach ($tasks as $i => $taskData) {
            $project = Project::find($taskData['project_id']);
            $collaboratorUsers = $project->collaborators;
            $assignee = $collaboratorUsers->random();
            $taskNumber = $i + 1;

            \App\Models\Task::create([
                'title' => $taskData['title'],
                'description' => fake()->paragraph(1),
                'status' => $taskData['status'],
                'priority' => $taskData['priority'],
                'due_date' => $taskData['due_date'],
                'project_id' => $taskData['project_id'],
                'task_number' => $taskNumber,
                'created_by' => $project->created_by,
                'collaborator_id' => $assignee->id,
            ]);
        }
    }
}
