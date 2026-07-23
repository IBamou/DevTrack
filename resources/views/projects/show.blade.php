@extends('layouts.main')

@section('title', $project->title . ' - DevTrack')

@php
    $totalTasks = $tasks->count();
    $completedTasks = $tasks->where('status', 'done')->count();
    $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;
    $isOverdue = $project->due_date && \Carbon\Carbon::parse($project->due_date)->isPast();
@endphp

@section('content')
<div class="flex flex-col h-full">
    <!-- Project Header -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
            <div class="min-w-0">
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">{{ $project->title }}</h1>
                @if($project->description)
                    <p class="mt-1 text-sm text-slate-500 line-clamp-2">{{ $project->description }}</p>
                @endif

                <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-slate-500">
                    <div class="flex items-center gap-1.5">
                        <div class="h-2 w-2 rounded-full {{ $progress == 100 ? 'bg-emerald-500' : ($isOverdue ? 'bg-red-500' : 'bg-blue-500') }}"></div>
                        <span class="font-medium text-slate-700">{{ $progress }}%</span>
                        <span>complete</span>
                        <span class="text-slate-300">&middot;</span>
                        <span>{{ $completedTasks }} of {{ $totalTasks }} tasks</span>
                    </div>

                    @if($project->due_date)
                        <div class="flex items-center gap-1.5">
                            <svg class="h-4 w-4 {{ $isOverdue ? 'text-red-500' : 'text-slate-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            <span class="{{ $isOverdue ? 'text-red-600 font-medium' : '' }}">
                                Due {{ \Carbon\Carbon::parse($project->due_date)->format('M d, Y') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-2 flex-shrink-0">
                <!-- Team avatars -->
                <div class="flex -space-x-2">
                    @foreach($project->collaborators->take(3) as $collaborator)
                        <x-ui.avatar :name="$collaborator->name" size="sm" class="ring-2 ring-white" />
                    @endforeach
                    @if($project->collaborators->count() > 3)
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-xs font-medium text-slate-600 ring-2 ring-white">+{{ $project->collaborators->count() - 3 }}</span>
                    @endif
                </div>

                <!-- Team button -->
                <button
                    x-on:click="$dispatch('open-drawer', 'team')"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50"
                >
                    <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    Team
                </button>

                @can('create', [App\Models\Task::class, $project])
                    <a href="{{ route('projects.tasks.create', $project) }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Task
                    </a>
                @endcan
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 flex items-center gap-1 border-b border-slate-200">
            <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'all']) }}" class="px-4 py-2.5 text-sm font-medium border-b-2 transition-colors {{ ($filter ?? 'all') == 'all' ? 'border-blue-600 text-blue-600' : 'border-transparent text-slate-500 hover:text-slate-700' }}">Board</a>
            <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'all']) }}" class="px-4 py-2.5 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700 transition-colors">List</a>
            @if($project->created_by === auth()->id())
                <a href="{{ route('projects.tasks.archives', $project) }}" class="px-4 py-2.5 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700 transition-colors">Archives</a>
            @endif
            <div class="ml-auto">
                <a href="{{ route('projects.edit', $project) }}" class="px-4 py-2.5 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700 transition-colors">Settings</a>
            </div>
        </div>
    </div>

    <!-- Kanban Board -->
    <div class="flex-1 overflow-x-auto pb-4">
        <div class="flex gap-4 items-start">
            <x-task.column status="todo" :tasks="$tasks->where('status', 'todo')" :project="$project" />
            <x-task.column status="in_progress" :tasks="$tasks->where('status', 'in_progress')" :project="$project" />
            <x-task.column status="review" :tasks="$tasks->where('status', 'review')" :project="$project" />
            <x-task.column status="done" :tasks="$tasks->where('status', 'done')" :project="$project" />
        </div>
    </div>
</div>

<!-- Team Drawer -->
<x-ui.drawer name="team" title="Project Members" maxWidth="md">
    <div class="p-6">
        <p class="text-sm text-slate-500 mb-4">{{ $project->collaborators->count() }} members</p>

        <ul class="space-y-4">
            @foreach($project->collaborators as $member)
                <li class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <x-ui.avatar :name="$member->name" size="base" />
                        <div>
                            <p class="text-sm font-medium text-slate-900">{{ $member->name }}</p>
                            <p class="text-xs text-slate-500">{{ $member->email }}</p>
                        </div>
                    </div>
                    @if($member->id === $project->created_by)
                        <x-ui.badge variant="blue">Owner</x-ui.badge>
                    @endif
                </li>
            @endforeach
        </ul>

        @if($project->created_by === auth()->id())
            <div class="mt-6 pt-6 border-t border-slate-200">
                <h2 class="text-sm font-medium text-slate-900 mb-3">Invite member</h2>
                <form action="{{ route('projects.collaborator.add', $project) }}" method="POST" class="flex gap-2">
                    @csrf
                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="member@example.com"
                        class="flex-1 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                    >
                    <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                        Invite
                    </button>
                </form>
            </div>
        @endif
    </div>
</x-ui.drawer>

<!-- Task Drawer -->
<x-ui.drawer name="task-detail" title="Task Details" maxWidth="lg">
    <div class="p-6" id="task-drawer-content">
        <p class="text-sm text-slate-500">Loading task details...</p>
    </div>
</x-ui.drawer>

@endsection

@section('scripts')
<script>
    // Task drawer handler
    window.addEventListener('open-task-drawer', async (e) => {
        const { taskId, projectId } = e.detail;
        window.dispatchEvent(new CustomEvent('open-drawer', { detail: 'task-detail' }));

        try {
            const response = await fetch(`/projects/${projectId}/task/${taskId}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            const html = await response.text();
            document.getElementById('task-drawer-content').innerHTML = html;
        } catch (error) {
            document.getElementById('task-drawer-content').innerHTML = '<p class="text-sm text-red-500">Failed to load task details.</p>';
        }
    });

    // Create task drawer handler
    window.addEventListener('open-create-task', (e) => {
        const { status } = e.detail;
        window.location.href = `{{ route('projects.tasks.create', $project) }}?status=${status}`;
    });
</script>
@endsection
