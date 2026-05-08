<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Show the form for creating a new task.
     */
    public function create(Project $project)
    {
        $this->authorize('create', [Task::class, $project]);
        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created task.
     */
    public function store(TaskRequest $request, Project $project)
    {
        $this->authorize('create', [Task::class, $project]);

        $data = $request->validated();
        Task::create($data + [
            'created_by' => $project->createdBy->id,
            'project_id' => $project->id
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Task created successfully.');
    }

    /**
     * Show a single task.
     */
    public function show(Project $project, Task $task)
    {
        $this->authorize('view', $task);
        $task->load(['project', 'assignedTo', 'creator']);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing a task.
     */
    public function edit(Project $project, Task $task)
    {
        $this->authorize('update', $task);
        $task->load(['project', 'assignedTo', 'creator']);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update a task.
     */
    public function update(TaskRequest $request, Project $project, Task $task)
    {
        $this->authorize('update', $task);

        $data = $request->validated();
        $task->update($data);

        return redirect()->route('projects.show', $task->project)->with('success', 'Task updated successfully.');
    }

    /**
     * Update task status only.
     */
    public function updateStatus(Request $request, Project $project, Task $task)
    {
        $this->authorize('updateStatus', $task);

        $data = $request->validate([
            'status' => 'required|in:todo,in_progress,review,done'
        ]);

        $task->update($data);

        return redirect()->route('projects.show', $task->project)->with('success', 'Task status updated successfully.');
    }

    /**
     * Archive (soft delete) a task.
     */
    public function archive(Project $project, Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('projects.show', $task->project)->with('success', 'Task archived successfully.');
    }

    /**
     * Restore a soft-deleted task.
     */
    public function restore(Project $project, Task $task)
    {
        $task = Task::withTrashed()->findOrFail($task->id);
        $this->authorize('restore', $task);
        
        $task->restore();
        return redirect()->back()->with('success', 'Task restored successfully.');
    }

    /**
     * Permanently delete a task.
     */
    public function forcedelete(Project $project, Task $task)
    {
        $task = Task::withTrashed()->findOrFail($task->id);
        $this->authorize('forceDelete', $task);
        
        $task->forceDelete();
        return redirect()->back()->with('success', 'Task permanently deleted.');
    }

    /**
     * View all archived (deleted) tasks.
     */
    public function viewArchived()
    {
        $this->authorize('viewArchived', Task::class);
        
        $tasks = Task::onlyTrashed()
            ->with(['project', 'creator', 'assignedTo'])
            ->get();

        return view('tasks.archives', compact('tasks'));
    }

    /**
     * View archived tasks for a specific project.
     */
    public function viewProjectArchived(Project $project)
    {
        $this->authorize('viewArchived', Task::class);
        
        $tasks = Task::onlyTrashed()
            ->where('project_id', $project->id)
            ->with(['project', 'creator', 'assignedTo'])
            ->get();

        return view('tasks.archives', compact('tasks', 'project'));
    }

    /**
     * Assign a task to a collaborator.
     */
    public function assignTo(Request $request, Project $project, Task $task)
    {
        $this->authorize('update', $task);

        $data = $request->validate([
            'collaborator_id' => 'required|exists:collaborators,id'
        ]);

        $task->update($data);

        return redirect()->route('projects.show', $task->project)->with('success', 'Task assigned successfully.');
    }

}
