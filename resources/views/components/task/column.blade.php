@props([
    'status',
    'tasks' => collect(),
    'project',
])

@php
    $statusConfig = match($status) {
        'todo' => [
            'label' => 'Todo',
            'bg' => 'bg-slate-50',
            'headerBg' => 'bg-slate-100',
            'dot' => 'bg-slate-400',
            'border' => 'border-slate-200',
        ],
        'in_progress' => [
            'label' => 'In Progress',
            'bg' => 'bg-blue-50/50',
            'headerBg' => 'bg-blue-50',
            'dot' => 'bg-blue-500',
            'border' => 'border-blue-200',
        ],
        'review' => [
            'label' => 'Review',
            'bg' => 'bg-violet-50/50',
            'headerBg' => 'bg-violet-50',
            'dot' => 'bg-violet-500',
            'border' => 'border-violet-200',
        ],
        'done' => [
            'label' => 'Done',
            'bg' => 'bg-emerald-50/50',
            'headerBg' => 'bg-emerald-50',
            'dot' => 'bg-emerald-500',
            'border' => 'border-emerald-200',
        ],
        default => [
            'label' => ucfirst($status),
            'bg' => 'bg-slate-50',
            'headerBg' => 'bg-slate-100',
            'dot' => 'bg-slate-400',
            'border' => 'border-slate-200',
        ],
    };
@endphp

<div class="flex w-72 flex-shrink-0 flex-col">
    <div class="flex items-center justify-between rounded-t-2xl border border-b-0 {{ $statusConfig['border'] }} {{ $statusConfig['headerBg'] }} px-4 py-2.5">
        <div class="flex items-center gap-2">
            <span class="h-2.5 w-2.5 rounded-full {{ $statusConfig['dot'] }}"></span>
            <h2 class="text-sm font-semibold text-slate-700">{{ $statusConfig['label'] }}</h2>
            <span class="inline-flex h-5 min-w-[20px] items-center justify-center rounded-full bg-white px-1.5 text-2xs font-medium text-slate-600 shadow-sm">
                {{ $tasks->count() }}
            </span>
        </div>

        @can('create', [App\Models\Task::class, $project])
            <button
                x-on:click="window.dispatchEvent(new CustomEvent('open-create-task', { detail: { status: '{{ $status }}' } }))"
                class="rounded-md p-1 text-slate-400 hover:bg-white hover:text-slate-600"
                aria-label="Add task to {{ $statusConfig['label'] }}"
            >
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        @endcan
    </div>

    <div
        class="flex-1 space-y-2.5 overflow-y-auto rounded-b-2xl border {{ $statusConfig['border'] }} {{ $statusConfig['bg'] }} p-2.5 min-h-[200px]"
        x-data="{ dragging: false }"
        x-on:dragover.prevent="dragging = true"
        x-on:dragleave="dragging = false"
        x-on:drop.prevent="dragging = false; $dispatch('task-dropped', { status: '{{ $status }}', taskId: $event.dataTransfer.getData('text/plain') })"
        :class="dragging ? 'ring-2 ring-blue-400 ring-opacity-50' : ''"
    >
        @forelse($tasks as $task)
            <div
                draggable="true"
                x-on:dragstart="$event.dataTransfer.setData('text/plain', '{{ $task->id }}')"
                class="cursor-grab active:cursor-grabbing"
            >
                <x-task.card :task="$task" :project="$project" />
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-8 text-center">
                <svg class="mb-2 h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-xs text-slate-400">No tasks yet</p>
            </div>
        @endforelse
    </div>
</div>
