# Eloquent Models

## Overview

This document describes the Eloquent models in the DevTrack application.

## Models

### User

Represents application users (authenticatable).

**Namespace:** `App\Models\User`

**Extends:** `Illuminate\Foundation\Auth\User`

**Fillable:** `name`, `email`, `password`

**Hidden:** `password`, `remember_token`

**Casts:**
- `email_verified_at` → `datetime`
- `password` → `hashed`

**Relationships:**

| Method | Type | Model | Description |
|--------|------|-------|-------------|
| `projects()` | BelongsToMany | Project | Projects the user collaborates on (via Collaborator pivot) |

---

### Project

Represents a project that can have tasks and collaborators.

**Namespace:** `App\Models\Project`

**Extends:** `Illuminate\Database\Eloquent\Model`

**Fillable:** `title`, `description`, `created_by`

**Relationships:**

| Method | Type | Model | Description |
|--------|------|-------|-------------|
| `tasks()` | HasMany | Task | Tasks belonging to this project |
| `collaborators()` | BelongsToMany | User | Users collaborating on this project (via Collaborator pivot) |

---

### Task

Represents a task within a project, assigned to a collaborator.

**Namespace:** `App\Models\Task`

**Extends:** `Illuminate\Database\Eloquent\Model`

**Fillable:** `title`, `description`, `status`, `priority`, `due_date`, `created_by`, `collaborator_id`, `project_id`

**Relationships:**

| Method | Type | Model | Description |
|--------|------|-------|-------------|
| `project()` | BelongsTo | Project | Project the task belongs to |
| `collaborator()` | BelongsTo | Collaborator | User assigned to the task |
| `creator()` | BelongsTo | User | User who created the task |

---

### Collaborator

Pivot model for the many-to-many relationship between Users and Projects.

**Namespace:** `App\Models\Collaborator`

**Extends:** `Illuminate\Database\Eloquent\Relations\Pivot`

**Fillable:** `user_id`, `project_id`, `role`

**Relationships:**

| Method | Type | Model | Description |
|--------|------|-------|-------------|
| `user()` | BelongsTo | User | User in this collaboration |
| `project()` | BelongsTo | Project | Project in this collaboration |

**Methods:**

| Method | Return | Description |
|--------|--------|-------------|
| `isAdmin()` | `bool` | Check if role is 'admin' |
| `isMember()` | `bool` | Check if role is 'member' |

---

## Relationship Summary

```
User
  └── projects() → Project (many-to-many via Collaborator)

Project
  └── tasks() → Task (one-to-many)
  └── collaborators() → User (many-to-many via Collaborator)

Task
  └── project() → Project (belongsTo)
  └── collaborator() → Collaborator (belongsTo)
  └── creator() → User (belongsTo)

Collaborator (Pivot)
  └── user() → User (belongsTo)
  └── project() → Project (belongsTo)
```