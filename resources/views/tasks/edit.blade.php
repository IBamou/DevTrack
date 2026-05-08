@extends('layouts.main')

@section('title', 'Edit Task - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-6">
        <p class="text-sm font-medium text-slate-500">{{ $task->project->title }} <span class="mx-1 text-slate-400">&rsaquo;</span> Edit</p>
        <h1 class="text-3xl font-bold text-slate-800 mt-2">Edit Task</h1>
        <p class="mt-1 text-slate-600">Update task details for #DT-{{ $task->id }}</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <form method="POST" action="{{ route('projects.tasks.update', ['project' => $task->project->id, 'task' => $task->id]) }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="title" class="text-sm font-medium text-slate-700">Task Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4" required>
                        @error('title')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                        <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="status" class="text-sm font-medium text-slate-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                                <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>To Do</option>
                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="review" {{ $task->status == 'review' ? 'selected' : '' }}>Review</option>
                                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>
                        <div>
                            <label for="priority" class="text-sm font-medium text-slate-700">Priority</label>
                            <select name="priority" id="priority" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>
                        <div>
                            <label for="due_date" class="text-sm font-medium text-slate-700">Due Date</label>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $task->due_date) }}" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('projects.tasks.show', ['project' => $task->project->id, 'task' => $task->id]) }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">Task Info</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-slate-500">Task ID</span>
                        <span class="text-sm font-mono font-medium text-slate-800">#DT-{{ $task->id }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-slate-500">Project</span>
                        <span class="text-sm font-medium text-slate-800">{{ $task->project->title }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-slate-500">Created</span>
                        <span class="text-sm font-medium text-slate-800">{{ $task->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection