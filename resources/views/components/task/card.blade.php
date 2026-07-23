@props([
    'task',
    'project',
    'compact' => false,
])

@php
    $priorityConfig = match($task->priority) {
        'high' => ['class' => 'bg-red-50 text-red-700', 'label' => 'HIGH'],
        'medium' => ['class' => 'bg-amber-50 text-amber-700', 'label' => 'MED'],
        'low' => ['class' => 'bg-emerald-50 text-emerald-700', 'label' => 'LOW'],
        default => ['class' => 'bg-slate-100 text-slate-600', 'label' => ucfirst($task->priority ?? 'none')],
    };

    $isOverdue = $task->due_date && \Carbon\Carbon::parse($task->due_date)->isPast() && $task->status !== 'done';
    $isDueToday = $task->due_date && \Carbon\Carbon::parse($task->due_date)->isToday();
@endphp

<div
    x-data="{ showMenu: false }"
    class="group rounded-xl border border-slate-200 bg-white p-4 transition-all duration-150 hover:border-slate-300 hover:shadow-card cursor-pointer"
    x-on:click.prevent="window.dispatchEvent(new CustomEvent('open-task-drawer', { detail: { taskId: {{ $task->id }}, projectId: {{ $project->id }} } }))"
>
    <div class="flex items-start justify-between gap-2">
        <span class="inline-flex items-center rounded-md px-1.5 py-0.5 text-2xs font-semibold {{ $priorityConfig['class'] }}">
            {{ $priorityConfig['label'] }}
        </span>

        <div class="relative" x-on:click.stop>
            <button
                x-on:click="showMenu = !showMenu"
                class="rounded p-0.5 text-slate-400 opacity-0 transition-opacity hover:bg-slate-100 hover:text-slate-600 group-hover:opacity-100"
            >
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                </svg>
            </button>

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
                <a href="{{ route('projects.tasks.show', ['project' => $project->id, 'task' => $task->id]) }}" class="flex items-center gap-2 px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50">
                    View
                </a>
                <a href="{{ route('projects.tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}" class="flex items-center gap-2 px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50">
                    Edit
                </a>
            </div>
        </div>
    </div>

    <h4 class="mt-2.5 text-sm font-medium leading-snug text-slate-900 line-clamp-2">{{ $task->title }}</h4>

    <div class="mt-3 flex items-center justify-between text-2xs text-slate-500">
        <span class="font-mono">{{ $task->task_code }}</span>

        <div class="flex items-center gap-2">
            @if($task->due_date)
                <span class="{{ $isOverdue ? 'text-red-600 font-medium' : ($isDueToday ? 'text-amber-600 font-medium' : '') }}">
                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d') }}
                </span>
            @endif

            @if($task->assignedTo && $task->assignedTo->user)
                <x-ui.avatar :name="$task->assignedTo->user->name" size="xs" />
            @endif
        </div>
    </div>
</div>
