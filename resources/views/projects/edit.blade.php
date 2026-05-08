@extends('layouts.main')

@section('title', 'Edit ' . $project->title . ' - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-6">
        <p class="text-sm font-medium text-slate-500">Projects <span class="mx-1 text-slate-400">&rsaquo;</span> {{ $project->title }} <span class="mx-1 text-slate-400">&rsaquo;</span> Edit</p>
        <h1 class="text-3xl font-bold text-slate-800 mt-2">Project Settings</h1>
    </div>

    <form method="POST" action="{{ route('projects.update', $project) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h2 class="text-lg font-semibold text-slate-800 mb-4">General Settings</h2>
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="text-sm font-medium text-slate-700">Project Name</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                            @error('title')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">{{ old('description', $project->description) }}</textarea>
                        </div>
                        <div>
                            <label for="due_date" class="text-sm font-medium text-slate-700">Deadline</label>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $project->due_date) }}" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end space-x-3">
                        <a href="{{ route('projects.show', $project) }}" class="px-4 py-2 text-sm font-medium text-slate-700 border border-slate-300 rounded-md hover:bg-slate-50">Cancel</a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Save Changes</button>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-lg border border-slate-200 p-6">
                    <h2 class="text-lg font-semibold text-slate-800 mb-4">Project Members</h2>
                    <ul class="space-y-3">
                        @foreach($project->collaborators as $member)
                        <li class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <img class="h-8 w-8 rounded-full" src="{{ $member->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($member->name) }}" alt="{{ $member->name }}">
                                <span class="text-sm font-medium text-slate-700">{{ $member->name }}</span>
                            </div>
                            @if($member->role === 'owner')
                            <span class="text-xs text-slate-500">Owner</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection