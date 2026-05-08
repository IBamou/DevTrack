@extends('layouts.main')

@section('title', 'Projects - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold">Projects</h1>
            <p class="text-slate-500 mt-1">Manage and track all your team's active workspaces.</p>
        </div>
        <a href="{{ route('projects.create') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-700">
            <svg class="h-5 w-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /></svg>
            New Project
        </a>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('projects.index') }}" class="flex flex-col sm:flex-row items-center justify-between mb-6 space-y-3 sm:space-y-0">
        <div class="flex items-center space-x-1 bg-slate-200 p-1 rounded-lg">
            <button type="submit" name="filter" value="" class="px-3 py-1 text-sm font-medium rounded-md {{ !request('filter') || request('filter') === '' ? 'bg-white shadow text-slate-900' : 'text-slate-600 hover:text-slate-800' }}">All</button>
            <button type="submit" name="filter" value="active" class="px-3 py-1 text-sm font-medium rounded-md {{ request('filter') === 'active' ? 'bg-white shadow text-slate-900' : 'text-slate-600 hover:text-slate-800' }}">Active</button>
            <button type="submit" name="filter" value="archived" class="px-3 py-1 text-sm font-medium rounded-md {{ request('filter') === 'archived' ? 'bg-white shadow text-slate-900' : 'text-slate-600 hover:text-slate-800' }}">Archived</button>
        </div>
        <div class="flex items-center space-x-3">
            <div class="relative w-48">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" class="block w-full bg-white border-slate-300 rounded-md pl-10 pr-10 py-2 text-sm placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search projects...">
            </div>
            <select name="sort" onchange="this.form.submit()" class="flex items-center px-3 py-2 text-sm font-medium bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
            </select>
            <button type="submit" class="px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">Search</button>
        </div>
    </form>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($projects as $project)
        <x-project-card :project="$project" />
        @empty
        <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
            <svg class="h-12 w-12 text-slate-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            @if(request('search'))
            <h3 class="text-lg font-medium text-slate-900 mb-1">No projects found</h3>
            <p class="text-slate-500 mb-4">Try adjusting your search</p>
            <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Clear Search</a>
            @elseif(request('filter') === 'archived')
            <h3 class="text-lg font-medium text-slate-900 mb-1">No archived projects</h3>
            <p class="text-slate-500">Archived projects will appear here</p>
            @else
            <h3 class="text-lg font-medium text-slate-900 mb-1">No projects yet</h3>
            <p class="text-slate-500 mb-4">Create your first project to get started</p>
            <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                New Project
            </a>
            @endif
        </div>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</div>
@endsection