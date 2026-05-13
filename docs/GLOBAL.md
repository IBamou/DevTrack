# DevTrack - Global Documentation

## Table of Contents

1. [Overview](#overview)
2. [Tech Stack](#tech-stack)
3. [Architecture](#architecture)
4. [Features](#features)
5. [Database Schema](#database-schema)
6. [Eloquent Models](#eloquent-models)
7. [Routes & Endpoints](#routes--endpoints)
8. [Installation](#installation)
9. [Development Tools](#development-tools)
10. [Known Bugs & Issues](#known-bugs--issues)

---

## Overview

**DevTrack** is a project management application built with Laravel 13 that allows users to create projects, manage tasks, and collaborate with team members. It provides authentication, project creation, task management with status/priority tracking, and archival features for both projects and tasks.

---

## Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | Laravel 13 (PHP 8.3) |
| Frontend | TailwindCSS 3 + Alpine.js |
| Build Tool | Vite 8 |
| Database | MySQL or SQLite |
| Authentication | Laravel Breeze |
| Debugging | Laravel Telescope + Xdebug |
| Testing | Pest PHP |

---

## Architecture

```
Request Flow:
┌─────────────┐    ┌──────────────┐    ┌─────────────┐
│   Routes    │ →  │  Middleware  │ →  │  Policies   │
└─────────────┘    └──────────────┘    └─────────────┘
        ↓                                          ↓
┌─────────────┐    ┌──────────────┐    ┌─────────────┐
│   Views     │ ←  │ Controllers  │ ←  │FormRequests │
└─────────────┘    └──────────────┘    └─────────────┘
                           ↓
                    ┌──────────────┐
                    │    Models    │
                    └──────────────┘
                           ↓
                    ┌──────────────┐
                    │   Database    │
                    └──────────────┘
```

---

## Features

### Authentication
- User registration and login (Laravel Breeze)
- Email verification support
- Password reset functionality
- Session management

### Project Management
- Create, edit, delete projects
- Archive/restore projects (soft delete)
- Assign collaborators with roles (admin/member)
- Project creator has full control

### Task Management
- Create, edit, delete tasks within projects
- Assign tasks to collaborators
- Status tracking: todo, in_progress, done
- Priority levels: low, medium, high
- Due date tracking
- Archive/restore tasks (soft delete)

### Collaboration
- Many-to-many relationship between users and projects
- Role-based access (admin, member)
- Task assignment to collaborators

---

## Database Schema

### MLD Diagram

```mermaid
erDiagram
    USERS }o--o{ PROJECTS : "collaborators (pivot)"
    PROJECTS ||--o{ TASKS : "has"
    USERS ||--o{ TASKS : "creates"
    COLLABORATORS ||--o{ TASKS : "assigned_to"

    USERS {
        bigint id PK
        string name
        string email UK
        string password
        timestamp email_verified_at
        timestamp created_at
        timestamp updated_at
    }

    COLLABORATORS {
        bigint id PK
        bigint user_id FK
        bigint project_id FK
        enum role
        timestamp created_at
        timestamp updated_at
        timestamp deleted_at (soft delete)
    }

    PROJECTS {
        bigint id PK
        string title
        text description
        bigint created_by FK
        timestamp created_at
        timestamp updated_at
        timestamp deleted_at (soft delete)
    }

    TASKS {
        bigint id PK
        string title
        text description
        bigint project_id FK
        bigint collaborator_id FK
        bigint created_by FK
        enum status
        enum priority
        date due_date
        timestamp created_at
        timestamp updated_at
        timestamp deleted_at (soft delete)
    }
```

### Table Relationships

| Table | Related To | Type |
|-------|------------|------|
| users | projects | Many-to-Many (via collaborators) |
| projects | collaborators | One-to-Many |
| projects | tasks | One-to-Many |
| collaborators | tasks | One-to-Many |
| users | tasks | One-to-Many |

---

## Eloquent Models

### User (`App\Models\User`)
- **Extends:** `Illuminate\Foundation\Auth\User`
- **Fillable:** `name`, `email`, `password`
- **Hidden:** `password`, `remember_token`
- **Casts:** `email_verified_at` → datetime, `password` → hashed
- **Relationships:** `projects()` → BelongsToMany (via Collaborator)

### Project (`App\Models\Project`)
- **Fillable:** `title`, `description`, `created_by`
- **Relationships:**
  - `tasks()` → HasMany
  - `collaborators()` → BelongsToMany (via Collaborator)
- **Uses:** SoftDeletes

### Task (`App\Models\Task`)
- **Fillable:** `title`, `description`, `status`, `priority`, `due_date`, `created_by`, `collaborator_id`, `project_id`
- **Relationships:**
  - `project()` → BelongsTo
  - `collaborator()` → BelongsTo
  - `creator()` → BelongsTo
- **Uses:** SoftDeletes

### Collaborator (`App\Models\Collaborator`)
- **Extends:** `Pivot`
- **Fillable:** `user_id`, `project_id`, `role`
- **Methods:**
  - `isAdmin()` → bool
  - `isMember()` → bool
- **Uses:** SoftDeletes

---

## Routes & Endpoints

### Public Routes

| Method | URI | Name | Controller |
|--------|-----|------|-------------|
| GET | / | welcome | Closure |
| GET | /dashboard | dashboard | Closure |

### Auth Routes (Breeze)

| Method | URI | Name |
|--------|-----|------|
| GET | register | register |
| POST | register | - |
| GET | login | login |
| POST | login | - |
| GET | forgot-password | password.request |
| POST | forgot-password | password.email |
| GET | reset-password/{token} | password.reset |
| POST | reset-password | password.store |

### Protected Routes (auth)

#### Projects

| Method | URI | Name |
|--------|-----|------|
| GET | /projects | project.index |
| GET | /projects/archives | projects.archives |
| GET | /projects/create | project.create |
| POST | /projects/store | project.store |
| GET | /projects/{project} | project.show |
| POST | /projects/{project}/edit | project.edit |
| PUT | /projects/{project}/update | project.update |
| PATCH | /projects/{project}/archive | projects.archive |
| PATCH | /projects/{project}/restore | projects.restore |
| DELETE | /projects/{project}/forceDelete | projects.forceDelete |

#### Tasks

| Method | URI | Name |
|--------|-----|------|
| GET | /projects/{project}/task/create | projects.tasks.create |
| POST | /projects/{project}/task/store | projects.tasks.store |
| GET | /projects/{project}/task/{task_record}/edit | projects.tasks.edit |
| PATCH | /projects/{project}/task/{task_record}/update | projects.tasks.update |
| PATCH | /projects/{project}/task/{task_record}/archive | projects.tasks.archive |
| PATCH | /projects/{project}/task/{task_record}/restore | projects.tasks.restore |
| DELETE | /projects/{project}/task/{task_record}/forceDelete | projects.tasks.forceDelete |

### Middleware
- `auth` - Requires authentication
- `verified` - Requires verified email
- `guest` - Redirects authenticated users
- `signed` - Requires valid signed URL
- `throttle` - Rate limiting

---

## Installation

### Prerequisites
- PHP >= 8.3
- Composer
- Node.js & npm
- MySQL or SQLite
- Git

### Steps

```bash
# 1. Clone and install
git clone <repo-url>
cd DevTrack
composer install

# 2. Configure environment
cp .env.example .env
php artisan key:generate

# 3. Setup database
CREATE DATABASE devtrack;
php artisan migrate

# 4. Frontend
npm install
npm run build

# 5. Run servers
php artisan serve       # Terminal 1
npm run dev            # Terminal 2
```

Access at: `http://127.0.0.1:8000`

### Useful Commands
```bash
php artisan migrate:fresh --seed  # Reset database
php artisan optimize:clear        # Clear caches
```

---

## Development Tools

### Laravel Breeze
Authentication scaffolding:
```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

### Laravel Telescope
Debugging and monitoring:
```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

### Xdebug (VS Code)
Config in `.vscode/launch.json`:
```json
{
    "version": "0.2.0",
    "configurations": [{
        "name": "Listen for Xdebug",
        "type": "php",
        "request": "launch",
        "port": 9003,
        "pathMappings": { "/var/www/html": "${workspaceFolder}" }
    }]
}
```

PHP configuration (`php.ini`):
```ini
[xdebug]
xdebug.mode=debug
xdebug.client_host=localhost
xdebug.client_port=9003
```

---

## Known Bugs & Issues

### Critical (System Breaking)

| # | Issue | Location | Solution |
|---|-------|----------|----------|
| 1 | Route Model Binding fails for nested task routes | `routes/web.php` | Use explicit binding with `Route::bind('task_record', ...)` |
| 2 | Authorization array syntax not matching policy | `TaskController.php` | Use `$this->authorize('create', [Task::class, $project])` |
| 3 | Duplicate method declarations | `TaskController.php` | Remove duplicate methods |

### High (Functionality Broken)

| # | Issue | Location | Solution |
|---|-------|----------|----------|
| 4 | due_date format error on edit form | `tasks/edit.blade.php` | Use `$task->due_date` directly (string, not Carbon) |
| 5 | Inconsistent parameter names across stack | Routes/Controller/Views | Standardize all to `task_record` |

### Medium

| # | Issue | Solution |
|---|-------|----------|
| 6 | Missing route cache after changes | `php artisan optimize:clear` |
| 7 | Soft delete handling in restore/forceDelete | Use `Task::withTrashed()->findOrFail($id)` |

### Prevention Checklist
- [ ] Clear routes after any route changes: `php artisan optimize:clear`
- [ ] Use unique parameter names that don't conflict with model names
- [ ] Match parameter names across ALL layers (routes → controller → views)
- [ ] Use array syntax for policies with additional parameters: `[Model::class, $project]`
- [ ] Use `withTrashed()` for soft-deleted model queries
- [ ] Test authorization after creating new endpoints
- [ ] Check for duplicate method declarations in controllers

---

## Project Structure

```
DevTrack/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   ├── Requests/
│   │   └── Policies/
│   └── Models/
├── config/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── docs/                 # Documentation
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── tests/
├── .env.example
├── composer.json
├── package.json
└── vite.config.js
```

---

## License

MIT License - Laravel framework is open-sourced software licensed under the MIT license.