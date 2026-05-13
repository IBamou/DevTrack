@extends('layouts.main')

@section('title', 'Dashboard - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Welcome back, {{ explode(' ', Auth::user()->name)[0] }}</h1>
        <p class="text-slate-500 mt-1">Here's what's happening with your projects today.</p>
    </div>

    <!-- Active Projects -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold">Active Projects</h2>
            <a href="{{ route('projects.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center">
                View All Projects <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        @if($activeProjects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($activeProjects as $project)
            <a href="{{ route('projects.show', $project) }}" class="bg-white rounded-lg shadow-sm p-5 block hover:shadow-md transition-shadow">
                <h3 class="text-lg font-semibold">{{ $project->title }}</h3>
                <p class="text-sm text-slate-600 mt-1 line-clamp-2">{{ $project->description }}</p>
                <div class="mt-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-slate-600">Progress</span>
                        <span class="font-semibold">{{ $project->progress }}%</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $project->progress }}%"></div>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex -space-x-2">
                        @foreach($project->collaborators->take(3) as $collaborator)
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="{{ $collaborator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($collaborator->name) }}" alt="{{ $collaborator->name }}">
                        @endforeach
                    </div>
                    <span class="text-sm text-slate-500">{{ $project->tasks_count }} Tasks</span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
            <p class="text-slate-500">No active projects yet.</p>
            <a href="{{ route('projects.create') }}" class="inline-block mt-2 text-sm font-medium text-blue-600 hover:text-blue-800">Create your first project</a>
        </div>
        @endif
    </div>

    <!-- My Tasks -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">My Tasks</h2>
                    <p class="text-sm text-slate-500 mt-1">Recent deliverables assigned specifically to you.</p>
                </div>
            </div>
        </div>
        @if($myTasks->count() > 0)
        <div>
            <div class="grid grid-cols-5 gap-4 px-6 py-3 text-xs font-semibold uppercase text-slate-500 border-b border-slate-200">
                <div class="col-span-2">Task Name</div>
                <div>Project</div>
                <div>Status</div>
                <div class="text-right">Due Date</div>
            </div>
            <div class="divide-y divide-slate-100">
                @foreach($myTasks->take(5) as $task)
                <div class="grid grid-cols-5 gap-4 px-6 py-4 items-center text-sm">
                    <div class="col-span-2 font-medium">
                        <a href="{{ route('projects.tasks.show', ['project' => $task->project ?? 0, 'task' => $task]) }}" class="hover:text-blue-600">
                            {{ $task->title }}
                        </a>
                    </div>
                    <div>{{ $task->project?->title ?? 'Deleted Project' }}</div>
                    <div>
                        @php
                        $statusClass = match($task->status) {
                            'done' => 'bg-green-100 text-green-700',
                            'in_progress' => 'bg-blue-100 text-blue-700',
                            'review' => 'bg-yellow-100 text-yellow-700',
                            default => 'bg-slate-100 text-slate-700',
                        };
                    @endphp
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </div>
                    <div class="text-right text-slate-500">
                        {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d') : '—' }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="p-6 text-center">
            <p class="text-slate-500">No tasks assigned to you yet.</p>
        </div>
        @endif
    </div>
</div>
@endsection