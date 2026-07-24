@extends('layouts.main')

@section('title', 'Archives - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="overflow-hidden mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="min-w-0">
                <p class="text-sm font-medium text-slate-500">Workspace <span class="mx-1 text-slate-400">&rsaquo;</span> <span class="text-slate-700 font-semibold">Archives</span></p>
                <h1 class="text-3xl font-bold text-slate-800 mt-2">Project Archives</h1>
                <p class="mt-1 text-slate-600">View, restore, or permanently remove retired projects.</p>
            </div>
            <a href="{{ route('projects.index') }}" class="shrink-0 inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">
                Active Projects
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $project)
        <div class="bg-white rounded-lg border border-slate-200 flex flex-col">
            <div class="p-5">
                <div class="flex justify-between items-start">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">Archived</span>
                    <div class="flex -space-x-2">
                        @foreach($project->collaborators->take(2) as $collaborator)
                        <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="{{ $collaborator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($collaborator->name) }}" alt="{{ $collaborator->name }}">
                        @endforeach
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 mt-3">{{ $project->title }}</h3>
                <p class="text-sm text-slate-600 mt-1 line-clamp-2">{{ $project->description }}</p>
                <div class="mt-4 flex items-center space-x-4 text-sm text-slate-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        {{ $project->tasks->count() }} tasks
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $project->deleted_at?->format('M d, Y') ?? 'N/A' }}
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-200 mt-auto flex divide-x divide-slate-200">
                <form action="{{ route('projects.restore', $project) }}" method="POST" class="w-full">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="w-full py-3 text-sm font-medium text-slate-600 hover:bg-slate-50 flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4v5h5M20 20v-5h-5M4 4l16 16"></path>
                        </svg>
                        Restore
                    </button>
                </form>
                <button type="button" class="w-full py-3 text-sm font-medium text-red-600 hover:bg-slate-50 flex items-center justify-center" onclick="document.getElementById('delete-modal-{{ $project->id }}').classList.remove('hidden')">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                    </svg>
                    Delete
                </button>
            </div>
        </div>

        <div id="delete-modal-{{ $project->id }}" class="fixed inset-0 z-50 hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/50" onclick="document.getElementById('delete-modal-{{ $project->id }}').classList.add('hidden')"></div>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 rounded-full bg-red-100">
                            <svg class="h-8 w-8 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 9v4m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-800 text-center mb-2">Delete Project?</h3>
                    <p class="text-sm text-slate-600 text-center mb-6">This will permanently delete <strong>{{ $project->title }}</strong> and all its tasks. This action cannot be undone.</p>
                    <form action="{{ route('projects.forceDelete', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex space-x-3">
                            <button type="button" onclick="document.getElementById('delete-modal-{{ $project->id }}').classList.add('hidden')" class="flex-1 px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</button>
                            <button type="submit" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">Delete Permanently</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
            <svg class="h-12 w-12 text-slate-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
            </svg>
            <h2 class="text-lg font-medium text-slate-900 mb-1">No archived projects</h2>
            <p class="text-slate-500">Archived projects will appear here</p>
        </div>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</div>
@endsection