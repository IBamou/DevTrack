@extends('layouts.main')

@section('title', 'Create Task - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-6">
        <p class="text-sm font-medium text-slate-500">{{ $project->title }} <span class="mx-1 text-slate-400">&rsaquo;</span> Create New</p>
        <h1 class="text-3xl font-bold text-slate-800 mt-2">Add a New Task</h1>
        <p class="mt-1 text-slate-600">Create a new task for this project.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <form method="POST" action="{{ route('projects.tasks.store', $project) }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="title" class="text-sm font-medium text-slate-700">Task Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4" required>
                        @error('title')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                        <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="status" class="text-sm font-medium text-slate-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                                <option value="todo" {{ old('status') == 'todo' ? 'selected' : '' }}>To Do</option>
                                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="review" {{ old('status') == 'review' ? 'selected' : '' }}>Review</option>
                                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                        </div>
                        <div>
                            <label for="priority" class="text-sm font-medium text-slate-700">Priority</label>
                            <select name="priority" id="priority" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                                <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>
                        <div>
                            <label for="due_date" class="text-sm font-medium text-slate-700">Due Date</label>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('projects.show', $project) }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Create Task</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-blue-50 rounded-lg border border-blue-100 p-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">Pro Tips</h3>
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">1</span>
                        <div class="ml-3 text-sm">
                            <p class="font-semibold text-slate-700">Be specific.</p>
                            <p class="text-slate-600">Write a clear title.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">2</span>
                        <div class="ml-3 text-sm">
                            <p class="font-semibold text-slate-700">Set priority wisely.</p>
                            <p class="text-slate-600">High for critical tasks.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection