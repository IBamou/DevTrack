# DevTrack Application - Detailed Bug Report

## Overview
This document provides a comprehensive analysis of bugs in the DevTrack application, following the request lifecycle stack from **Database → Models → Routes → Middlewares → Policies → FormRequests → Controllers → Views**.

---

## 🔴 CRITICAL (System Breaking)

---

### BUG #1: Route Model Binding Fails for Task Model

| Layer | Component |
|-------|----------|
| **Where** | `routes/web.php` (lines 41-45) |
| **Why** | Laravel 13 implicit route model binding fails with nested parameters `{project}/task/{task}` |
| **Error** | `TypeError: Argument #2 ($task) must be of type App\Models\Task, string given` |

#### How It Works (Expected):
```
1. User visits: /projects/1/task/1/edit
2. Laravel matches route: Route::get('/{project}/task/{task}/edit')
3. Laravel tries implicit model binding for {task} → Task::find(1)
4. Controller receives: edit(Project $project, Task $task)
```

#### How It Breaks:
```
1. User visits: /projects/1/task/1/edit  
2. Laravel matches route but {task} remains as string "1"
3. Controller receives: edit(Project $project, "1" (string))
4. TypeError thrown
```

#### Solution:
```php
// routes/web.php - Add explicit binding BEFORE routes
Route::bind('task_record', function ($value) {
    return Task::findOrFail($value);
});

// Then use {task_record} instead of {task}
Route::get('/{project}/task/{task_record}/edit', 'edit')
```

#### Files Affected:
- `routes/web.php` - Bind parameter name
- `app/Http/Controllers/TaskController.php` - Method parameter name
- `resources/views/projects/show.blade.php` - Link generation
- `resources/views/tasks/edit.blade.php` - Form action
- `resources/views/tasks/archives.blade.php` - Restore/Delete actions

---

### BUG #2: Authorization Array Syntax Not Matching Policy Signature

| Layer | Component |
|-------|----------|
| **Where** | `app/Http/Controllers/TaskController.php` (lines 19, 28) |
| **Why** | Policy expects Project parameter but controller passes Task class only |
| **Error** | Authorization fails, wrong user can create tasks |

#### The Policy (`app/Policies/TaskPolicy.php` line 23):
```php
public function create(User $user, Project $project): bool
{
    return $user->is($project->createdBy);
}
```

#### Wrong Controller Call:
```php
$this->authorize('create', Task::class);  // ❌ Only passes Task
```

#### Correct Controller Call:
```php
$this->authorize('create', [Task::class, $project]);  // ✅ Passes Task AND Project
```

#### Solution:
The controller now correctly passes:
```php
$this->authorize('create', [Task::class, $project]);
```

---

### BUG #3: Duplicate Method Declarations

| Layer | Component |
|-------|----------|
| **Where** | `app/Http/Controllers/TaskController.php` |
| **Why** | Multiple edits caused duplicate methods |
| **Error** | `Cannot redeclare restore() / forcedelete()` |

#### Solution:
Clean controller - ensure each method appears only once.

---

## 🟠 HIGH (Functionality Broken)

---

### BUG #4: due_date Format Error on Edit Form

| Layer | Layer |
|------|-------|
| **Where** | `resources/views/tasks/edit.blade.php` (line 136) |
| **Why** | `due_date` stored as string, not Carbon object |
| **Error** | `Call to member function format() on string` |

#### Migration Defines (`database/migrations/2026_05_04_100002_create_tasks_table.php` line 20):
```php
$table->date('due_date')->nullable();
// date() returns string in Y-m-d format
```

#### Wrong View Code:
```blade
value="{{ $task->due_date->format('Y-m-d') }}"  // ❌ String doesn't have format()
```

#### Correct View Code:
```blade
value="{{ $task->due_date }}"  // ✅ Just pass the string directly
```

---

### BUG #5: Inconsistent Parameter Names Across Stack

| Layer | Component |
|------|----------|
| **Where** | Routes, Controller, Views don't match |
| **Why** | Changes weren't propagated consistently |

#### The Stack Breakdown:

| Layer | Before (Broken) | After (Fixed) |
|------|----------------|--------------|
| Routes param | `{task}` | `{task_record}` |
| Controller | `Task $task` | `Task $task_record` |
| View link | `'task' => $task->id` | `'task_record' => $task->id` |

#### Solution - Standardize All:
```php
// routes/web.php
Route::get('/{project}/task/{task_record}/edit', 'edit')

// Controller  
public function edit(Project $project, Task $task_record)

// View
route('projects.tasks.edit', ['project' => $project->id, 'task_record' => $task->id])
```

---

## 🟡 MEDIUM (Confusion)

---

### BUG #6: Missing Route Cache After Changes

| Layer | Component |
|------|----------|
| **Where** | Any route changes |
| **Why** | Laravel caches routes in production |
| **Error** | Old routes still active, new routes not found |

#### Solution:
```bash
php artisan optimize:clear
```

Or for just routes:
```bash
php artisan route:clear
```

---

### BUG #7: Soft Delete Handling in restore/forceDelete

| Layer | Component |
|------|----------|
| **Where** | `app/Http/Controllers/TaskController.php` (lines 84-96, 132-144) |
| **Why** | Soft deleted task needs special query |

#### Model Uses SoftDeletes (`app/Models/Task.php` lines 12):
```php
use SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
```

#### Regular Query Won't Find Soft-Deleted:
```php
Task::findOrFail($id)  // ❌ Won't find deleted tasks
```

#### Must Use withTrashed():
```php
Task::withTrashed()->findOrFail($id)  // ✅ Finds deleted too
```

---

### BUG #8: Nested Routes Without Explicit Project Binding

| Layer | Component |
|------|----------|
| **Where** | `routes/web.php` (lines 21-34) |
| **Why** | Nested under projects prefix but no project model binding |

#### Working Because:
Routes are under `/projects` prefix, and Laravel finds model:
```php
Route::get('/{project}/task/{task_record}', ...)
$this->authorize('update', $task_record);  // TaskPolicy check doesn't need project
```

#### But Authorization Chain is:
1. Policy: `update(User $user, Task $task)`
2. Checks: `$user->is($task->creator)` (creator is user_id from `created_by`)
3. Task has `project_id` → Can access project tasks

---

## 🟢 LOW (Info)

---

### BUG #9: Task Archives Shows Only Soft-Deleted Tasks

| Layer | Component |
|------|----------|
| **Where** | `app/Http/Controllers/TaskController.php` (line 148) |

```php
public function viewArchived(){
    $archivedTasks = Task::onlyTrashed()->get();
    return view('tasks.archives', compact('archivedTasks'));
}
```

---

## Request Flow Diagram

```
User Request
    ↓
┌─────────────────────────────────────────────────────────────┐
│ MIGRATIONS                                                 │
│ tasks table: id, project_id, created_by, title, status...   │
│ uses SoftDeletes → has deleted_at column                   │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ MODELS                                                     │
│ Task.php → belongsTo Project, creator User               │
│ SoftDeletes trait → enables soft delete                   │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ ROUTES (routes/web.php)                                    │
│ Route::bind('task_record', ...) → Explicit binding       │
│ /{project}/task/{task_record}/edit                      │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ MIDDLEWARE & AUTH                                           │
│ auth, verified middleware                                 │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ POLICIES (app/Policies/TaskPolicy.php)                     │
│ create(User, Project) → $user->is($project->createdBy)  │
│ view(User, Task) → $user->is($task->creator)                │
│ update(User, Task) → $user->is($task->creator)          │
│ delete/restore/forceDelete → creator only              │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ FORM REQUESTS (app/Http/Requests/TaskRequest.php)          │
│ Validation: title, description, status, priority, due_date │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ CONTROLLERS (app/Http/Controllers/TaskController.php)      │
│ create(project) → authorize create[Task, project]         │
│ edit(project, task_record) → authorize update task     │
│ store/archive/restore/forcedelete                         │
└─────────────────────────────────────────────────────────────┘
    ↓
┌─────────────────────────────────────────────────────────────┐
│ VIEWS (resources/views/tasks/)                            │
│ create.blade.php → form posts to projects.tasks.store      │
│ edit.blade.php → form posts to projects.tasks.update      │
│ archives.blade.php → restore/delete actions           │
└─────────────────────────────────────────────────────────────┘
    ↓
Response to User
```

---

## Prevention Checklist

- [ ] Clear routes after any route changes: `php artisan optimize:clear`
- [ ] Use unique parameter names that don't conflict with model names
- [ ] Match parameter names across ALL layers (routes → controller → views)
- [ ] Use array syntax for policies with additional parameters: `[Model::class, $project]`
- [ ] Use `withTrashed()` for soft-deleted model queries
- [ ] Test authorization after creating new endpoints
- [ ] Check for duplicate method declarations in controllers