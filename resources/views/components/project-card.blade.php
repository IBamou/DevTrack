@props(['project'])

@php
    $totalTasks = $project->tasks->count();
    $completedTasks = $project->tasks->where('status', 'done')->count();
    $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;
    $isOverdue = $project->due_date && \Carbon\Carbon::parse($project->due_date)->isPast();
    $statusConfig = match($project->status) {
        'healthy' => ['class' => 'bg-emerald-50 text-emerald-700', 'label' => 'Healthy'],
        'at_risk' => ['class' => 'bg-amber-50 text-amber-700', 'label' => 'At Risk'],
        'delayed' => ['class' => 'bg-red-50 text-red-700', 'label' => 'Delayed'],
        default => ['class' => 'bg-slate-100 text-slate-600', 'label' => ucfirst($project->status)],
    };
@endphp

<div class="group card p-5 hover:shadow-card-hover transition-all duration-150" x-data="{ showMenu: false }">
    <div class="flex items-start justify-between gap-3">
        <a href="{{ route('projects.show', $project) }}" class="min-w-0 flex-1">
            <h3 class="text-base font-semibold text-slate-900 group-hover:text-blue-600 transition-colors truncate">{{ $project->title }}</h3>
        </a>

        <div class="relative flex-shrink-0" x-on:click.stop>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-full px-2 py-0.5 text-2xs font-medium {{ $statusConfig['class'] }}">
                    {{ $statusConfig['label'] }}
                </span>

                <button
                    x-on:click="showMenu = !showMenu"
                    class="rounded p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-600"
                    aria-label="Project actions"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                </button>
            </div>

            <div
                x-show="showMenu"
                x-cloak
                x-on:click.away="showMenu = false"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 top-full z-10 mt-1 w-36 rounded-lg border border-slate-200 bg-white py-1 shadow-card"
                style="display: none;"
            >
                <a href="{{ route('projects.show', $project) }}" class="flex items-center gap-2 px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50">
                    View
                </a>
                @can('update', $project)
                    <a href="{{ route('projects.edit', $project) }}" class="flex items-center gap-2 px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50">
                        Edit
                    </a>
                @endcan
                @can('delete', $project)
                    <form action="{{ route('projects.archive', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex w-full items-center gap-2 px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50">
                            Archive
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>

    @if($project->description)
        <a href="{{ route('projects.show', $project) }}" aria-label="View project: {{ $project->title }}">
            <p class="mt-2 text-sm text-slate-500 line-clamp-2">{{ $project->description }}</p>
        </a>
    @endif

    <!-- Progress -->
    <div class="mt-4">
        <div class="flex items-center justify-between text-sm mb-1.5">
            <span class="text-slate-500">{{ $progress }}% complete</span>
            <span class="text-slate-500">{{ $completedTasks }}/{{ $totalTasks }}</span>
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
</div>
