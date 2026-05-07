<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use function Laravel\Prompts\task;

class TaskController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Task::class);
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request, Project $project)
    {
        $this->authorize('create', Task::class);

        $data = $request->validated();
        $task = [
            ...$data,
            'created_by' => $project->createdBy->id,
            'project_id' => $project->id
        ];
        Task::create($task);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }


    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $data = $request->validated();
        $task->update($data);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function updateStatus(Request $request, Task $task){
        $this->authorize('updateStatus', $task);
        $data = $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task archived successfully.');
    }

    public function restore(Task $task){
        $this->authorize('restore', $task);
        $task->restore();
        return redirect()->route('tasks.index')->with('success', 'Task restored successfully.');
    }

    public function forceDelete(Task $task){
        $this->authorize('forceDelete', $task);
        $task->forceDelete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted permanently.');
    }

    public function archives(){
        $this->authorize('viewArchived', Task::class);
        $archivedTasks = Task::onlyTrashed()->get();
        return view('tasks.archived', compact('archivedTasks'));
    }

    public function assignedTo(Request $request, Task $task, Project $project){
        $this->authorize('update',$task);
        $data = $request->validate([
            'collaborator_id' => 'required|exists:collaborators,id'
        ]);

        
        if (!$project->collaborators()->where('user_id', $data['collaborator_id'])->exists()) {
            return back()->with('error', 'This user is not a collaborator.');
        }

        if ($task->assignedTo()->exists()) {
            return back()->with('error', 'This task is already assigned to a user.');
        }

        $task->update($data);
        return redirect()->route('tasks.index')->with('success', 'Task assigned successfully.');
    } 


}
