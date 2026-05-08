@extends('layouts.main')

@section('title', 'Create Project - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-6">
        <p class="text-sm font-medium text-slate-500">Projects <span class="mx-1 text-slate-400">&rsaquo;</span> Create New</p>
        <h1 class="text-3xl font-bold text-slate-800 mt-2">Launch a New Project</h1>
        <p class="mt-1 text-slate-600">Set up your team's workspace and start tracking progress.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg border border-slate-200 p-6">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-50 rounded-lg">
                        <svg class="h-7 w-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.828a4.5 4.5 0 01.707-2.122l2.121-2.121a6 6 0 017.38-5.84c.532.12.982.294 1.414.532l-2.828 2.828m-7.071 7.071l-2.121-2.121A4.5 4.5 0 016.928 6.928l-2.828-2.828a6 6 0 017.38-5.84c.532.12.982.294 1.414.532-4.281 1.77-6.883 6.83-5.289 11.211z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-slate-800">Project Details</h2>
                        <p class="text-sm text-slate-500">Enter basic information to get started.</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('projects.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <label for="title" class="text-sm font-medium text-slate-700">Project Name <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter project name" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4" required>
                        @error('title')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-2 text-xs text-slate-500">This will be the primary identifier for your project board.</p>
                    </div>
                    <div>
                        <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                        <textarea name="description" id="description" rows="5" placeholder="Describe your project goals and objectives" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 px-4">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="due_date" class="text-sm font-medium text-slate-700">Deadline</label>
                        <div class="relative mt-1">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" class="block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pl-10 pr-4">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-slate-500">* Required fields must be completed to launch.</p>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('projects.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                                Create Project
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-lg flex items-start space-x-3">
                <svg class="h-5 w-5 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                </svg>
                <div>
                    <h3 class="text-sm font-semibold">Missing Team Members?</h3>
                    <p class="text-sm mt-1">You'll be able to invite your developers and assign roles immediately after the project is created from the project dashboard.</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-blue-50 rounded-lg border border-blue-100 p-6">
                <div class="flex items-center space-x-3">
                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM16.5 13.5L18 15l1.5-1.5" />
                    </svg>
                    <h3 class="text-lg font-semibold text-slate-800">Pro Tips</h3>
                </div>
                <ol class="mt-4 space-y-4">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">1</span>
                        <div class="ml-3 text-sm">
                            <p class="font-semibold text-slate-700">Keep it concise.</p>
                            <p class="text-slate-600 mt-1">Great project names are short and memorable.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">2</span>
                        <div class="ml-3 text-sm">
                            <p class="font-semibold text-slate-700">Define the goal.</p>
                            <p class="text-slate-600 mt-1">Use the description to state exactly what success looks like.</p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">3</span>
                        <div class="ml-3 text-sm">
                            <p class="font-semibold text-slate-700">Realistic deadlines.</p>
                            <p class="text-slate-600 mt-1">Setting a deadline helps the team prioritize.</p>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection