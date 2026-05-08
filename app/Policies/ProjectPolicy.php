<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Project $project): bool
    {
        return $user->is($project->createdBy) || $project->collaborators->contains($user);
    }

    public function viewAnyArchived(User $user): bool
    {
        return true;
    }

    public function viewArchived(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }

    public function restore(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }

    public function addCollaborator(User $user, Project $project): bool
    {
        return $user->is($project->createdBy);
    }
}
