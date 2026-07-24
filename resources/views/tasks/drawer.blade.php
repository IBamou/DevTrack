<div class="p-6">
    <div class="mb-6">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ $task->project->title }}</p>
            <h1 class="text-2xl font-bold text-slate-800 mt-1">{{ $task->title }}</h1>
        </div>
    </div>

    <div class="space-y-5">
        <!-- Description -->
        <div class="rounded-lg border border-slate-200 p-4">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-sm font-semibold text-slate-800">Description</h2>
                @can('update', $task)
                    <a href="{{ route('projects.tasks.edit', ['project' => $task->project->id, 'task' => $task->id]) }}"
                        class="text-xs text-blue-600 hover:text-blue-700">Edit</a>
                @endcan
            </div>
            <p class="text-sm text-slate-600 whitespace-pre-wrap">{{ $task->description ?? 'No description provided.' }}</p>
        </div>

        <!-- Details -->
        <div class="rounded-lg border border-slate-200 p-4">
            <h2 class="text-sm font-semibold text-slate-800 mb-3">Details</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h3 class="text-xs font-medium text-slate-500">Status</h3>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium mt-1
                        {{ $task->status == 'done' ? 'bg-green-100 text-green-700' :
                            ($task->status == 'in_progress' ? 'bg-blue-100 text-blue-700' :
                                ($task->status == 'review' ? 'bg-yellow-100 text-yellow-700' : 'bg-slate-100 text-slate-700')) }}">
                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                    </span>
                </div>
                <div>
                    <h3 class="text-xs font-medium text-slate-500">Priority</h3>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium mt-1
                        {{ $task->priority == 'high' ? 'bg-red-100 text-red-700' :
                            ($task->priority == 'medium' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                        {{ ucfirst($task->priority) }}
                    </span>
                </div>
                <div>
                    <h3 class="text-xs font-medium text-slate-500">Due Date</h3>
                    <p class="text-sm text-slate-800 mt-1">
                        {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No due date' }}
                    </p>
                </div>
                <div>
                    <h3 class="text-xs font-medium text-slate-500">Created</h3>
                    <p class="text-sm text-slate-800 mt-1">{{ $task->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Task Info -->
        <div class="rounded-lg border border-slate-200 p-4">
            <h2 class="text-sm font-semibold text-slate-800 mb-3">Task Info</h2>
            <div class="space-y-2.5">
                <div class="flex justify-between items-center">
                    <span class="text-xs text-slate-500">Task ID</span>
                    <span class="text-xs font-mono font-medium text-slate-800">{{ $task->task_code }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-slate-500">Project</span>
                    <span class="text-xs font-medium text-slate-800">{{ $task->project->title }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-slate-500">Created by</span>
                    <span class="text-xs font-medium text-slate-800">{{ $task->creator->name }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-slate-500">Assigned to</span>
                    @if($task->assignedTo && $task->assignedTo->user)
                        <span class="text-xs font-medium text-slate-800">{{ $task->assignedTo->user->name }}</span>
                    @else
                        <span class="text-xs font-medium text-slate-400 italic">Unassigned</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions -->
        @can('isAdmin', $task)
            <div class="rounded-lg border border-slate-200 p-4">
                <h2 class="text-sm font-semibold text-slate-800 mb-3">Actions</h2>
                <div class="space-y-2">
                    <a href="{{ route('projects.tasks.edit', ['project' => $task->project->id, 'task' => $task->id]) }}"
                        class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Task
                    </a>
                    @can('assign', $task)
                        <button type="button" data-assign-btn
                            class="w-full flex items-center justify-center px-4 py-2 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg hover:bg-slate-50 transition-colors">
                            <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7" />
                            </svg>
                            Assign To
                        </button>
                    @endcan
                    <form id="archive-form" method="POST"
                        action="{{ route('projects.tasks.archive', ['project' => $task->project->id, 'task' => $task->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full flex items-center justify-center px-4 py-2 border border-red-300 text-red-700 text-sm font-medium rounded-lg hover:bg-red-50 transition-colors">
                            <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                            Archive Task
                        </button>
                    </form>
                </div>
            </div>
        @endcan

        @can('updateStatus', $task)
            @cannot('isAdmin', $task)
                <div class="rounded-lg border border-slate-200 p-4">
                    <h2 class="text-sm font-semibold text-slate-800 mb-3">Update Status</h2>
                    <form id="status-form" method="POST"
                        action="{{ route('projects.tasks.updateStatus', ['project' => $task->project->id, 'task' => $task->id]) }}">
                        @csrf
                        @method('PATCH')
                        <select name="status"
                            class="w-full rounded-lg border border-slate-300 bg-white py-2 px-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>To Do</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="review" {{ $task->status == 'review' ? 'selected' : '' }}>Review</option>
                            <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </form>
                </div>
            @endcannot
        @endcan
    </div>
</div>
