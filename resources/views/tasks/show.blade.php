@extends('layouts.main')

@section('title', $task->title . ' - DevTrack')

@section('content')
    <div class="p-6 lg:p-8">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ $task->project->title }}</p>
                    <h1 class="text-3xl font-bold text-slate-800 mt-1">{{ $task->title }}</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('projects.show', $task->project) }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Project
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-slate-800">Description</h2>
                        @can('update', $task)
                            <a href="{{ route('projects.tasks.edit', ['project' => $task->project->id, 'task' => $task->id]) }}"
                                class="text-sm text-blue-600 hover:text-blue-700">Edit</a>
                        @endcan
                    </div>
                    <p class="text-slate-600 whitespace-pre-wrap">{{ $task->description ?? 'No description provided.' }}</p>
                </div>

                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h2 class="text-lg font-semibold text-slate-800 mb-4">Details</h2>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-sm font-medium text-slate-500">Status</h3>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium mt-1
                                                    {{ $task->status == 'done' ? 'bg-green-100 text-green-700' :
                                ($task->status == 'in_progress' ? 'bg-blue-100 text-blue-700' :
                                    ($task->status == 'review' ? 'bg-yellow-100 text-yellow-700' : 'bg-slate-100 text-slate-700')) }}">
                                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                                </span>
                    
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-slate-500">Priority</h3>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium mt-1
                                {{ $task->priority == 'high' ? 'bg-red-100 text-red-700' :
        ($task->priority == 'medium' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-slate-500">Due Date</h3>
                            <p class="text-slate-800 mt-1">
                                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No due date' }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-slate-500">Created</h3>
                            <p class="text-slate-800 mt-1">{{ $task->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                @can('isAdmin', $task)
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <h3 class="text-sm font-semibold text-slate-800 mb-4">Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('projects.tasks.edit', ['project' => $task->project->id, 'task' => $task->id]) }}"
                                class="w-full flex items-center justify-center px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit Task
                            </a>
                            @can('assign', $task)
                                <button type="button" onclick="document.getElementById('assignModal').classList.remove('hidden')"
                                    class="w-full flex items-center justify-center px-4 py-2.5 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">
                                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7" />
                                    </svg>
                                    Assign To
                                </button>
                            @endcan
                            <form method="POST"
                                action="{{ route('projects.tasks.archive', ['project' => $task->project->id, 'task' => $task->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full flex items-center justify-center px-4 py-2.5 border border-red-300 text-red-700 rounded-lg hover:bg-red-50 transition-colors"
                                    onclick="return confirm('Archive this task?')">
                                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                    Archive Task
                                </button>
                            </form>
                        </div>
                    </div>
                @endcan

                @can('updateStatus', $task)
                    @cannot('isAdmin', $task)

                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <h3 class="text-sm font-semibold text-slate-800 mb-4">Update Status</h3>
                        <form method="POST"
                            action="{{ route('projects.tasks.updateStatus', ['project' => $task->project->id, 'task' => $task->id]) }}">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()"
                                class="w-full rounded-md border border-slate-300 bg-white py-2 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>To Do</option>
                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress
                                </option>
                                <option value="review" {{ $task->status == 'review' ? 'selected' : '' }}>Review</option>
                                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                            <button aria-hidden="true"></button>
                        </form>
                    </div>
                    @endcannot
                @endcan

                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h3 class="text-sm font-semibold text-slate-800 mb-4">Task Info</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Task ID</span>
                            <span class="text-sm font-mono font-medium text-slate-800">{{ $task->task_code }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Project</span>
                            <span class="text-sm font-medium text-slate-800">{{ $task->project->title }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Created by</span>
                            <span class="text-sm font-medium text-slate-800">{{ $task->creator->name }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-slate-500">Assigned to</span>
                            @if($task->assignedTo && $task->assignedTo->user)
                                <span class="text-sm font-medium text-slate-800">{{ $task->assignedTo->user->name }}</span>
                            @else
                                <span class="text-sm font-medium text-slate-400 italic">Unassigned</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h3 class="text-sm font-semibold text-slate-800 mb-4">Activity</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ $task->creator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->creator->name) }}"
                                    alt="{{ $task->creator->name }}">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-slate-800">
                                    <span class="font-medium">{{ $task->creator->name }}</span> created this task
                                </p>
                                <p class="text-xs text-slate-500">{{ $task->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @if($task->assignedTo && $task->assignedTo->user)
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ $task->assignedTo->user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->assignedTo->user->name) }}"
                                        alt="{{ $task->assignedTo->user->name }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-slate-800">
                                        <span class="font-medium">{{ $task->assignedTo->user->name }}</span> assigned to
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <span class="flex items-center justify-center h-8 w-8 rounded-full bg-slate-200">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7"/></svg>
                                    </span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm text-slate-500 italic">Not yet assigned</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('assign', $task)
        <div id="assignModal" class="fixed inset-0 z-50 hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('assignModal').classList.add('hidden')">
            </div>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Assign Task</h3>
                    <form method="POST"
                        action="{{ route('projects.tasks.assign', ['project' => $task->project->id, 'task' => $task->id]) }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-slate-700 mb-2">Assign to</label>
                            <select name="collaborator_id" required
                                class="w-full rounded-md border border-slate-300 bg-white py-2 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Select a team member</option>
                                @foreach($task->project->collaborators as $member)
                                    <option value="{{ $member->pivot->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="document.getElementById('assignModal').classList.add('hidden')"
                                class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endsection
