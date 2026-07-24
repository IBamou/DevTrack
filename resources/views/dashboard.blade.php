@extends('layouts.main')

@section('title', 'Dashboard - DevTrack')

@php
    $user = Auth::user();
    $hour = \Carbon\Carbon::now()->hour;
    $greeting = match(true) {
        $hour < 12 => 'Good morning',
        $hour < 17 => 'Good afternoon',
        default => 'Good evening',
    };

    $activeProjectsCount = $activeProjects->count();
    $myTasksCount = $myTasks->count();
    $dueTodayCount = $myTasks->filter(fn($t) => $t->due_date && \Carbon\Carbon::parse($t->due_date)->isToday())->count();
    $overdueCount = $myTasks->filter(fn($t) => $t->due_date && \Carbon\Carbon::parse($t->due_date)->isPast() && $t->status !== 'done')->count();
@endphp

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="overflow-hidden">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="min-w-0">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">{{ $greeting }}, {{ explode(' ', $user->name)[0] }}</h1>
                <p class="mt-1 text-sm text-slate-500">Here's what needs your attention today.</p>
            </div>
            <a href="{{ route('projects.create') }}" class="shrink-0 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Create Project
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('projects.index') }}" class="card p-5 hover:shadow-card-hover transition-shadow">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50">
                    <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900">{{ $activeProjectsCount }}</p>
                    <p class="text-xs text-slate-500">Active projects</p>
                </div>
            </div>
        </a>

        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-violet-50">
                    <svg class="h-5 w-5 text-violet-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900">{{ $myTasksCount }}</p>
                    <p class="text-xs text-slate-500">Tasks assigned to me</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-50">
                    <svg class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900">{{ $dueTodayCount }}</p>
                    <p class="text-xs text-slate-500">Due today</p>
                </div>
            </div>
        </div>

        <div class="card p-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50">
                    <svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-slate-900">{{ $overdueCount }}</p>
                    <p class="text-xs text-slate-500">Overdue tasks</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- My Tasks (2 columns) -->
        <div class="lg:col-span-2">
            <div class="card">
                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                    <div>
                        <h2 class="text-base font-semibold text-slate-900">My Tasks</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Tasks assigned to you</p>
                    </div>
                    @if($myTasksCount > 5)
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">View all</a>
                    @endif
                </div>

                @if($myTasks->count() > 0)
                    <div class="divide-y divide-slate-100">
                        @foreach($myTasks->take(5) as $task)
                            @php
                                $isOverdue = $task->due_date && \Carbon\Carbon::parse($task->due_date)->isPast() && $task->status !== 'done';
                                $isDueToday = $task->due_date && \Carbon\Carbon::parse($task->due_date)->isToday();
                            @endphp
                            <a href="{{ route('projects.tasks.show', ['project' => $task->project ?? 0, 'task' => $task]) }}" class="flex items-center gap-4 px-6 py-3.5 hover:bg-slate-50 transition-colors">
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-slate-900 truncate">{{ $task->title }}</p>
                                    <div class="mt-1 flex items-center gap-2 text-xs text-slate-500">
                                        <span>{{ $task->project?->title ?? 'Deleted Project' }}</span>
                                        @if($task->due_date)
                                            <span class="text-slate-300">&middot;</span>
                                            <span class="{{ $isOverdue ? 'text-red-600 font-medium' : ($isDueToday ? 'text-amber-600 font-medium' : '') }}">
                                                {{ \Carbon\Carbon::parse($task->due_date)->format('M d') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <x-task.status-badge :status="$task->status" size="sm" />
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="px-6 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        <p class="mt-3 text-sm text-slate-500">No tasks assigned to you yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Project Progress (1 column) -->
        <div class="lg:col-span-1">
            <div class="card">
                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                    <div>
                        <h2 class="text-base font-semibold text-slate-900">Project Progress</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Active projects</p>
                    </div>
                    <a href="{{ route('projects.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">View all</a>
                </div>

                @if($activeProjects->count() > 0)
                    <div class="divide-y divide-slate-100">
                        @foreach($activeProjects->take(5) as $project)
                            @php
                                $progress = $project->tasks_count > 0 ? round(($project->completed_tasks_count / $project->tasks_count) * 100) : 0;
                                $isOverdue = $project->due_date && \Carbon\Carbon::parse($project->due_date)->isPast();
                            @endphp
                            <a href="{{ route('projects.show', $project) }}" class="block px-6 py-4 hover:bg-slate-50 transition-colors">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-slate-900 truncate">{{ $project->title }}</p>
                                        @if($project->due_date)
                                            <p class="mt-0.5 text-xs {{ $isOverdue ? 'text-red-600' : 'text-slate-500' }}">
                                                Due {{ \Carbon\Carbon::parse($project->due_date)->format('M d') }}
                                            </p>
                                        @endif
                                    </div>
                                    <span class="text-sm font-semibold text-slate-700">{{ $progress }}%</span>
                                </div>

                                <div class="mt-3">
                                    <div class="h-1.5 w-full rounded-full bg-slate-100">
                                        <div
                                            class="h-1.5 rounded-full {{ $progress == 100 ? 'bg-emerald-500' : ($isOverdue ? 'bg-red-500' : 'bg-blue-500') }}"
                                            style="width: {{ $progress }}%"
                                        ></div>
                                    </div>
                                    <p class="mt-1.5 text-xs text-slate-500">{{ $project->completed_tasks_count ?? 0 }} of {{ $project->tasks_count }} tasks</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="px-6 py-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                        <p class="mt-3 text-sm text-slate-500">No active projects yet.</p>
                        <a href="{{ route('projects.create') }}" class="mt-3 inline-flex items-center gap-1.5 text-sm font-medium text-blue-600 hover:text-blue-700">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Create your first project
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
