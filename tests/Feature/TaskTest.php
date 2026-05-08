<?php

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can view task show page', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->get("/projects/{$project->id}/task/{$task->id}");

    $response->assertStatus(200);
});

it('can view task edit page', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->get("/projects/{$project->id}/task/{$task->id}/edit");

    $response->assertStatus(200);
});

it('can update task', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
    ]);

    $response = $this->actingAs($user)->put("/projects/{$project->id}/task/{$task->id}", [
        'title' => 'Updated Task Title',
        'description' => 'Updated description',
        'status' => 'in_progress',
        'priority' => 'high',
    ]);

    $this->assertDatabaseHas('tasks', [
        'id' => $task->id,
        'title' => 'Updated Task Title',
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

    $task->refresh();
    expect($task->deleted_at)->not->toBeNull();
});

it('can view create task page', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);

    $response = $this->actingAs($user)->get("/projects/{$project->id}/task/create");

    $response->assertStatus(200);
});

it('validates task creation', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);

    $response = $this->actingAs($user)->post("/projects/{$project->id}/task", [
        'title' => '',
    ]);

    $response->assertSessionHasErrors('title');
});

it('can filter tasks by status', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create(['created_by' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'created_by' => $user->id,
        'status' => 'done',
    ]);

    $response = $this->actingAs($user)->get("/projects/{$project->id}?filter=done");

    $response->assertStatus(200);
});