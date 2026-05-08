<?php

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can view projects index', function () {
    $response = $this->get('/projects');

    $response->assertStatus(302);
});

it('can create a project', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/projects', [
        'title' => 'Test Project',
        'description' => 'Test description',
    ]);

    $this->assertDatabaseHas('projects', [
        'title' => 'Test Project',
    ]);
});

it('can view project show page', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);

    $response = $this->actingAs($user)->get("/projects/{$project->id}");

    $response->assertStatus(200);
});

it('can create a task in a project', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);

    $response = $this->actingAs($user)->post("/projects/{$project->id}/task", [
        'title' => 'Test Task',
        'description' => 'Test task description',
        'status' => 'todo',
        'priority' => 'medium',
    ]);

    $this->assertDatabaseHas('tasks', [
        'title' => 'Test Task',
        'project_id' => $project->id,
    ]);
});

it('can archive a task', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->delete("/projects/{$project->id}/task/{$task->id}");

    $this->assertSoftDeleted('tasks', [
        'id' => $task->id,
    ]);
});

it('can restore an archived task', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
    ]);
    $task->delete();

    $response = $this->actingAs($user)->patch("/projects/{$project->id}/task/{$task->id}/restore");

    $this->assertDatabaseHas('tasks', [
        'id' => $task->id,
    ]);
});

it('can update task status', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->patch("/projects/{$project->id}/task/{$task->id}/status", [
        'status' => 'done',
    ]);

    $task->refresh();
    expect($task->status)->toBe('done');
});

it('can view archived projects', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/projects/archives');

    $response->assertStatus(200);
});

it('can restore an archived project', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $project->delete();

    $response = $this->actingAs($user)->patch("/projects/{$project->id}/restore");

    $this->assertDatabaseHas('projects', [
        'id' => $project->id,
    ]);
});