<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        return $user->is($task->creator) || $task->project?->collaborators->contains($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }

    /*
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return $user->is($task->creator);
    }

    public function updateStatus(User $user, Task $task): bool
    {
        return $user->is($task->creator) || $user->id === ($task->assignedTo?->user_id ?? null);
    }

    /**
     * Determine whether the user can delete (archive) the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->is($task->creator);
    }

    public function viewArchived(User $user, ?Task $task = null): bool
    {
        return Project::where('created_by', $user->id)->exists();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        return $user->is($task->creator) || $user->is($task->project?->createdBy);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return $user->is($task->creator) || $user->is($task->project?->createdBy);
    }

    /**
     * Determine if user is project admin (owner).
     */
    public function isAdmin(User $user, Task $task): bool
    {
        return $user->is($task->project->createdBy);
    }

    /**
     * Determine if user can assign the task.
     */
    public function assign(User $user, Task $task): bool
    {
        return $user->is($task->creator);
    }
}
