@extends('layouts.main')

@section('title', 'Projects - DevTrack')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Projects</h1>
            <p class="mt-1 text-sm text-slate-500">Manage and track all your team's active workspaces.</p>
        </div>
        <a href="{{ route('projects.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            New Project
        </a>
    </div>

    <!-- Filters -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <!-- Filter Tabs -->
        <div class="flex items-center gap-1 rounded-lg bg-slate-100 p-1">
            <a href="{{ route('projects.index') }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ !request('filter') || request('filter') === '' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">All</a>
            <a href="{{ route('projects.index', ['filter' => 'active']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ request('filter') === 'active' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">Active</a>
            <a href="{{ route('projects.index', ['filter' => 'archived']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ request('filter') === 'archived' ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-600 hover:text-slate-900' }}">Archived</a>
        </div>

        <!-- Search & Sort -->
        <form method="GET" action="{{ route('projects.index') }}" class="flex items-center gap-3">
            @if(request('filter'))
                <input type="hidden" name="filter" value="{{ request('filter') }}">
            @endif

            <div class="relative">
                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search projects..."
                    class="h-9 w-48 rounded-lg border border-slate-200 bg-white pl-9 pr-3 text-sm text-slate-900 placeholder-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                >
            </div>

            <select
                name="sort"
                onchange="this.form.submit()"
                class="h-9 rounded-lg border border-slate-200 bg-white px-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
            >
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
            </select>

            @if(request('search'))
                <a href="{{ route('projects.index', array_filter(['filter' => request('filter')])) }}" class="inline-flex items-center gap-1 text-sm text-slate-500 hover:text-slate-700">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($projects as $project)
            @php
                $progress = $project->tasks_count > 0 ? round(($project->completed_tasks_count / $project->tasks_count) * 100) : 0;
                $isOverdue = $project->due_date && \Carbon\Carbon::parse($project->due_date)->isPast();
                $statusConfig = match($project->status ?? 'active') {
                    'active' => ['class' => 'bg-emerald-50 text-emerald-700', 'label' => 'Active'],
                    'completed' => ['class' => 'bg-blue-50 text-blue-700', 'label' => 'Completed'],
                    'archived' => ['class' => 'bg-slate-100 text-slate-600', 'label' => 'Archived'],
                    default => ['class' => 'bg-slate-100 text-slate-600', 'label' => ucfirst($project->status ?? 'unknown')],
                };
            @endphp

            <a href="{{ route('projects.show', $project) }}" class="group card p-5 hover:shadow-card-hover transition-all duration-150">
                <div class="flex items-start justify-between gap-3">
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-semibold text-slate-900 group-hover:text-blue-600 transition-colors truncate">{{ $project->title }}</h3>
                        </div>
                        @if($project->description)
                            <p class="mt-1 text-sm text-slate-500 line-clamp-2">{{ $project->description }}</p>
                        @endif
                    </div>

                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-2xs font-medium {{ $statusConfig['class'] }}">
                        {{ $statusConfig['label'] }}
                    </span>
                </div>

                <!-- Progress -->
                <div class="mt-4">
                    <div class="flex items-center justify-between text-sm mb-1.5">
                        <span class="text-slate-500">{{ $progress }}% complete</span>
                        <span class="text-slate-500">{{ $project->completed_tasks_count ?? 0 }}/{{ $project->tasks_count }}</span>
                    </div>
                    <div class="h-1.5 w-full rounded-full bg-slate-100">
                        <div
                            class="h-1.5 rounded-full {{ $progress == 100 ? 'bg-emerald-500' : ($isOverdue ? 'bg-red-500' : 'bg-blue-500') }}"
                            style="width: {{ $progress }}%"
                        ></div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex -space-x-2">
                        @foreach($project->collaborators->take(3) as $collaborator)
                            <x-ui.avatar :name="$collaborator->name" size="xs" class="ring-2 ring-white" />
                        @endforeach
                        @if($project->collaborators->count() > 3)
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-2xs font-medium text-slate-600 ring-2 ring-white">+{{ $project->collaborators->count() - 3 }}</span>
                        @endif
                    </div>

                    @if($project->due_date)
                        <div class="flex items-center gap-1 text-xs {{ $isOverdue ? 'text-red-600' : 'text-slate-500' }}">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            {{ \Carbon\Carbon::parse($project->due_date)->format('M d') }}
                        </div>
                    @endif
                </div>
            </a>
        @empty
            <div class="col-span-full">
                <x-ui.empty-state
                    title="{{ request('search') ? 'No projects found' : 'No projects yet' }}"
                    description="{{ request('search') ? 'Try adjusting your search terms' : 'Create your first project to get started' }}"
                >
                    @if(request('search'))
                        <x-ui.button href="{{ route('projects.index') }}" variant="secondary">Clear Search</x-ui.button>
                    @else
                        <x-ui.button href="{{ route('projects.create') }}" variant="primary">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            New Project
                        </x-ui.button>
                    @endif
                </x-ui.empty-state>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($projects->hasPages())
        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
