@extends('layouts.main')

@section('title', $project->title . ' - DevTrack')

@push('styles')
<style>
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
@endpush

@section('content')
<div class="flex-1 flex overflow-hidden">
    <main class="flex-1 flex flex-col overflow-y-auto">
        <div class="px-6 py-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs uppercase font-semibold text-slate-500">
                        PROJECTS <span class="mx-1">&rsaquo;</span>
                        {{ strtoupper($project->title) }}
                    </p>
                    <h1 class="text-3xl font-bold text-slate-800 mt-1">{{ $project->title }}</h1>
                    <p class="flex items-center text-sm text-slate-500 mt-2">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Due: {{ $project->due_date ? \Carbon\Carbon::parse($project->due_date)->format('M d, Y') : 'No due date' }}
                    </p>
                </div>

                @can('create', [App\Models\Task::class, $project])
                <div class="flex items-center space-x-2 mt-4 sm:mt-0">
                    <a href="{{ route('projects.tasks.create', $project) }}" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Task
                    </a>
                    @if($project->created_by === auth()->id())
                    <a href="{{ route('projects.tasks.archives', $project) }}" class="inline-flex items-center rounded-md bg-white border border-slate-200 px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                        <svg class="w-5 h-5 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                        Archived Tasks
                    </a>
                    @endif
                </div>
                @endcan
            </div>

            <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-2 flex-wrap gap-y-2">
                    <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'all']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'all' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">All</a>
                    <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'my']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'my' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">My</a>
                    <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'todo']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'todo' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">Todo</a>
                    <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'in_progress']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'in_progress' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">In Progress</a>
                    <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'done']) }}" class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'done' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">Done</a>
                </div>

                <div class="flex items-center space-x-3 mt-4 sm:mt-0">
                    <button id="teamBtn" onclick="toggleTeamPopup()" class="flex items-center px-3 py-1.5 text-sm font-medium bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                        <svg class="h-5 w-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.877 9.877 0 0010 18c2.296 0 4.47-1.07 6.125-2.095a1.23 1.23 0 00.41-1.412A9.87 9.87 0 0010 12.5c-2.295 0-4.47 1.07-6.125 1.993z" />
                        </svg>
                        Team
                    </button>
                    <div class="flex -space-x-2 avatar-group">
                        @foreach($project->collaborators->take(4) as $collaborator)
                        <img class="inline-block h-8 w-8 rounded-full" src="{{ $collaborator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($collaborator->name) }}" alt="Avatar">
                        @endforeach
                        @if($project->collaborators->count() > 4)
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-200 text-xs font-medium text-slate-700">+{{ $project->collaborators->count() - 4 }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-x-auto">
            <div class="inline-grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-6 pb-6 min-w-max">
                <div class="w-72">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">Todo
                            <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'todo')->count() }}</span>
                        </h3>
                    </div>
                    <div class="space-y-3">
                        @forelse($tasks->where('status', 'todo') as $task)
                        <x-task-card :task="$task" :project="$project" />
                        @empty
                        <p class="text-sm text-slate-500 text-center py-4">No tasks</p>
                        @endforelse
                    </div>
                </div>

                <div class="w-72">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">In Progress
                            <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'in_progress')->count() }}</span>
                        </h3>
                    </div>
                    <div class="space-y-3">
                        @forelse($tasks->where('status', 'in_progress') as $task)
                        <x-task-card :task="$task" :project="$project" />
                        @empty
                        <p class="text-sm text-slate-500 text-center py-4">No tasks</p>
                        @endforelse
                    </div>
                </div>

                <div class="w-72">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">Review
                            <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'review')->count() }}</span>
                        </h3>
                    </div>
                    <div class="space-y-3">
                        @forelse($tasks->where('status', 'review') as $task)
                        <x-task-card :task="$task" :project="$project" />
                        @empty
                        <p class="text-sm text-slate-500 text-center py-4">No tasks</p>
                        @endforelse
                    </div>
                </div>

                <div class="w-72">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-lg">Done
                            <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'done')->count() }}</span>
                        </h3>
                    </div>
                    <div class="space-y-3">
                        @forelse($tasks->where('status', 'done') as $task)
                        <x-task-card :task="$task" :project="$project" />
                        @empty
                        <p class="text-sm text-slate-500 text-center py-4">No tasks</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<div id="teamPopup" class="fixed inset-0 z-50 hidden" aria-hidden="true">
    <div class="absolute inset-0 bg-black/50 transition-opacity" onclick="toggleTeamPopup()"></div>
    <div class="absolute right-0 top-0 h-full w-80 bg-white border-l border-slate-200 flex flex-col shadow-xl transform transition-transform duration-300 ease-in-out translate-x-full" id="teamPanel">
        <div class="p-6 h-full flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm uppercase font-semibold text-slate-500 tracking-wider">Project Members</h3>
                    <p class="text-sm text-slate-500 mt-1">Collaborators in this workspace</p>
                </div>
                <button onclick="toggleTeamPopup()" class="text-slate-400 hover:text-slate-600 p-1 rounded hover:bg-slate-100">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <ul class="mt-4 space-y-4 flex-1 overflow-y-auto">
                @foreach($project->collaborators as $member)
                <li class="flex items-center">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $member->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($member->name) }}" alt="{{ $member->name }}">
                    <div class="ml-3">
                        <p class="font-semibold">{{ $member->name }}</p>
                        <p class="text-sm text-slate-500">{{ $member->email }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
            @if($project->created_by === auth()->id())
            <form action="{{ route('projects.collaborator.add', $project) }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm text-slate-600 mb-1">Invite by Email</label>
                    <input type="email" name="email" required class="w-full px-3 py-2 border border-slate-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="member@example.com">
                </div>
                <button type="submit" class="w-full flex items-center justify-center py-2.5 border border-dashed border-slate-300 rounded-lg text-sm text-slate-600 hover:border-slate-400 hover:text-slate-800">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    Invite Member
                </button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleTeamPopup() {
        const popup = document.getElementById('teamPopup');
        const panel = document.getElementById('teamPanel');
        popup.classList.toggle('hidden');
        if (popup.classList.contains('hidden')) {
            panel.classList.add('translate-x-full');
            panel.classList.remove('translate-x-0');
        } else {
            setTimeout(() => {
                panel.classList.remove('translate-x-full');
                panel.classList.add('translate-x-0');
            }, 10);
        }
    }
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const popup = document.getElementById('teamPopup');
            if (!popup.classList.contains('hidden')) {
                toggleTeamPopup();
            }
        }
    });
</script>
@endsection