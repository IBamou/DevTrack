@props(['task', 'project'])

<a href="{{ route('projects.tasks.show', ['project' => $project->id, 'task' => $task->id]) }}" class="block bg-white rounded-lg border border-slate-200 p-4 hover:border-blue-300 hover:shadow-md transition-all">
    <div class="flex items-start justify-between">
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
            @if($task->priority === 'high') bg-red-100 text-red-700
            @elseif($task->priority === 'medium') bg-yellow-100 text-yellow-800
            @else bg-green-100 text-green-700 @endif">
            {{ ucfirst($task->priority) }}
        </span>
        @if($task->assignedTo && $task->assignedTo->user)
        <img class="h-6 w-6 rounded-full -mt-1"
            src="{{ $task->assignedTo->user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->assignedTo->user->name) }}"
            alt="{{ $task->assignedTo->user->name }}">
        @else
        <span class="flex items-center justify-center h-6 w-6 rounded-full bg-slate-200 -mt-1" title="Unassigned">
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7"/></svg>
        </span>
        @endif
    </div>
    <p class="font-semibold text-slate-800 mt-3 line-clamp-2">{{ $task->title }}</p>
    <div class="flex items-center justify-between mt-3 text-xs text-slate-500">
        <span class="font-mono">{{ $task->task_code }}</span>
        @if($task->due_date)
        <span class="{{ \Carbon\Carbon::parse($task->due_date)->isPast() ? 'text-red-500' : '' }}">
            {{ \Carbon\Carbon::parse($task->due_date)->format('M d') }}
        </span>
        @endif
    </div>
</a>
