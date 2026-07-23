@extends('layouts.main')

@section('title', 'Archived Tasks - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-slate-500">
                @isset($project)
                {{ $project->title }} <span class="mx-1 text-slate-400">&rsaquo;</span> Archives
                @else
                Archives <span class="mx-1 text-slate-400">&rsaquo;</span> Tasks
                @endisset
            </p>
            <h1 class="text-3xl font-bold text-slate-800 mt-2">Archived Tasks</h1>
            <p class="mt-1 text-slate-600">A list of all tasks that have been archived.</p>
        </div>
        @isset($project)
        <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">
            Back to Project
        </a>
        @endisset
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($tasks as $task)
        <div class="bg-white rounded-lg border border-slate-200 p-5">
            <div class="flex justify-between items-start">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">Archived</span>
                <span class="text-xs text-slate-500 font-mono">{{ $task->task_code }}</span>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 mt-3">{{ $task->title }}</h3>
            <p class="text-sm text-slate-600 mt-1 line-clamp-2">{{ $task->description }}</p>
            <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
                <span>{{ $task->project?->title ?? 'Deleted Project' }}</span>
                <span>{{ $task->deleted_at->format('M d, Y') }}</span>
            </div>
            <div class="mt-4 flex divide-x divide-slate-200 border-t border-slate-200 pt-4">
                @if($task->project)
                <form action="{{ route('projects.tasks.restore', ['project' => $task->project, 'task' => $task]) }}" method="POST" class="flex-1">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="w-full text-sm font-medium text-slate-600 hover:text-slate-800">Restore</button>
                </form>
                <button type="button" class="flex-1 text-sm font-medium text-red-600 hover:text-red-700" onclick="document.getElementById('delete-task-modal-{{ $task->id }}').classList.remove('hidden')">Delete</button>
                @endif
            </div>
        </div>

        <div id="delete-task-modal-{{ $task->id }}" class="fixed inset-0 z-50 hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('delete-task-modal-{{ $task->id }}').classList.add('hidden')"></div>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 rounded-full bg-red-100">
                            <svg class="h-8 w-8 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 9v4m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 text-center mb-2">Delete Task?</h3>
                    <p class="text-sm text-slate-600 text-center mb-6">This will permanently delete <strong>{{ $task->title }}</strong>. This action cannot be undone.</p>
                    <form action="{{ route('projects.tasks.forceDelete', ['project' => $task->project, 'task' => $task]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex space-x-3">
                            <button type="button" onclick="document.getElementById('delete-task-modal-{{ $task->id }}').classList.add('hidden')" class="flex-1 px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">Delete Permanently</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
            <svg class="h-12 w-12 text-slate-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
            </svg>
            <h3 class="text-lg font-medium text-slate-900 mb-1">No archived tasks</h3>
            <p class="text-slate-500">Archived tasks will appear here</p>
        </div>
        @endforelse
    </div>
</div>
@endsection