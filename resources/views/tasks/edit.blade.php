@extends('layouts.main')

@section('title', 'Edit Task - DevTrack')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="mb-8">
        <x-ui.breadcrumb :items="[
            ['label' => 'Projects', 'href' => route('projects.index')],
            ['label' => $task->project->title, 'href' => route('projects.show', $task->project)],
            ['label' => $task->task_code],
        ]" />
        <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-900">Edit Task</h1>
        <p class="mt-1 text-sm text-slate-500">Update task details for <span class="font-medium text-slate-700">{{ $task->task_code }}</span></p>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('projects.tasks.update', ['project' => $task->project->id, 'task' => $task->id]) }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <x-ui.input
                name="title"
                label="Task title"
                :value="old('title', $task->title)"
                placeholder="e.g. Implement user authentication"
                required
                autofocus
            />
            @error('title')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <x-ui.textarea
                name="description"
                label="Description"
                placeholder="Add more details about this task"
                rows="4"
            >{{ old('description', $task->description) }}</x-ui.textarea>
            @error('description')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <x-ui.select
                    name="status"
                    label="Status"
                    :options="[
                        'todo' => 'To Do',
                        'in_progress' => 'In Progress',
                        'review' => 'Review',
                        'done' => 'Done',
                    ]"
                    :selected="old('status', $task->status)"
                    :placeholder="null"
                />

                <x-ui.select
                    name="priority"
                    label="Priority"
                    :options="[
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                    ]"
                    :selected="old('priority', $task->priority)"
                    :placeholder="null"
                />

                <x-ui.input
                    name="due_date"
                    type="date"
                    label="Due date"
                    :value="old('due_date', $task->due_date)"
                />
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('projects.tasks.show', ['project' => $task->project->id, 'task' => $task->id]) }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">
                    Cancel
                </a>
                <x-ui.button type="submit" variant="primary">
                    Save Changes
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
@endsection