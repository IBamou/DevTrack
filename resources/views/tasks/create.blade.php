@extends('layouts.main')

@section('title', 'Create Task - DevTrack')

@section('content')
<div class="mx-auto max-w-2xl">
    <!-- Header -->
    <div class="mb-8">
        <x-ui.breadcrumb :items="[
            ['label' => 'Projects', 'href' => route('projects.index')],
            ['label' => $project->title, 'href' => route('projects.show', $project)],
            ['label' => 'Create Task'],
        ]" />
        <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-900">Create a new task</h1>
        <p class="mt-1 text-sm text-slate-500">Add a new task to <span class="font-medium text-slate-700">{{ $project->title }}</span></p>
    </div>

    <!-- Form -->
    <div class="card">
        <form method="POST" action="{{ route('projects.tasks.store', $project) }}" class="p-6 space-y-6">
            @csrf

            <x-ui.input
                name="title"
                label="Task title"
                value="{{ old('title') }}"
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
            >{{ old('description') }}</x-ui.textarea>
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
                    :placeholder="null"
                />
                @error('status')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <x-ui.select
                    name="priority"
                    label="Priority"
                    :options="[
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                    ]"
                    :placeholder="null"
                />
                @error('priority')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <x-ui.input
                    name="due_date"
                    type="date"
                    label="Due date"
                    value="{{ old('due_date') }}"
                />
                @error('due_date')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('projects.show', $project) }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">
                    Cancel
                </a>
                <x-ui.button type="submit" variant="primary">
                    Create Task
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
@endsection
