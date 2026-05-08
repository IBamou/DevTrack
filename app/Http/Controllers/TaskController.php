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
    public function show(Project $project, Task $task_record)
    {
        $this->authorize('view', $task_record);
        return view('tasks.show', compact('task_record'));
    }

    /**
     * Show the form for editing a task.
     */
    public function edit(Project $project, Task $task_record)
    {
        $this->authorize('update', $task_record);
        return view('tasks.edit', compact('task_record'));
    }

    /**
     * Update a task.
     */
    public function update(TaskRequest $request, Project $project, Task $task_record)
    {
        $this->authorize('update', $task_record);

        $data = $request->validated();
        $task_record->update($data);

        return redirect()->route('projects.show', $task_record->project)->with('success', 'Task updated successfully.');
    }

    /**
     * Update task status only.
     */
    public function updateStatus(Request $request, Project $project, Task $task_record)
    {
        $this->authorize('updateStatus', $task_record);

        $data = $request->validate([
            'status' => 'required|in:todo,in_progress,review,done'
        ]);

        $task_record->update($data);

        return redirect()->route('projects.show', $task_record->project)->with('success', 'Task status updated successfully.');
    }

    /**
     * Archive (soft delete) a task.
     */
    public function archive(Project $project, Task $task_record)
    {
        $this->authorize('delete', $task_record);
        $task_record->delete();

        return redirect()->route('projects.show', $task_record->project)->with('success', 'Task archived successfully.');
    }

    /**
     * Restore a soft-deleted task.
     */
    public function restore(Project $project, Task $task_record)
    {
        $task = Task::withTrashed()->findOrFail($task_record->id);
        $this->authorize('restore', $task);
        $task->restore();

        return redirect()->back()->with('success', 'Task restored successfully.');
    }

    public function forcedelete(Task $task){
        $this->authorize('forceDelete', $task);
        $task->forceDelete();

        return redirect()->back()->with('success', 'Task permanently deleted.');
    }

    public function viewArchived(){
        $this->authorize('viewArchived', Task::class);
        $archivedTasks = Task::onlyTrashed()->get();

        return view('tasks.archives', compact('archivedTasks'));
    }

    public function assignedTo(Request $request, Task $task){
        $this->authorize('update',$task);
        $assignedUser = $request->validate([
            'collaborator_id' => 'required|exists:collaborators,id'
        ]);
        $task->update($assignedUser);
        return redirect()->route('tasks.index')->with('success', 'Task assigned successfully.');
    }


}
