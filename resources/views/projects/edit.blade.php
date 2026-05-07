<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $project->title }} - DevTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html { font-size: 80%; }
        body { min-height: 100vh; margin: 0; }
        .h-screen { min-height: 100vh; height: auto; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900 antialiased">

    <div class="flex h-screen bg-slate-50">
        <!-- ==== Left Sidebar Start ==== -->
        <aside class="hidden lg:flex w-64 flex-shrink-0 bg-white border-r border-slate-200 flex-col">
            <!-- Logo -->
            <div class="h-16 flex items-center px-4">
                 <a href="{{ route('projects.index') }}" class="flex-shrink-0 flex items-center space-x-2">
                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11.917 15.242 6.023 9.478l.083-.083L12 3l5.977 6.395-.083.083-5.894 5.764Z" fill="currentColor"/>
                        <path d="m6.023 15.325 5.894 5.761 5.894-5.761-.083.083-5.811 5.681-5.811-5.681.083-.083Z" fill="currentColor"/>
                    </svg>
                    <span class="text-2xl font-bold text-slate-800">DevTrack</span>
                </a>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 px-4 py-4 space-y-2">
                <h3 class="px-3 text-xs font-semibold uppercase text-slate-500 tracking-wider">Main Menu</h3>
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a href="{{ route('projects.index') }}" class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-md">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                    <span class="text-sm font-medium">Projects</span>
                </a>
                <a href="{{ route('projects.archives') }}" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                    <span class="text-sm font-medium">Archives</span>
                </a>
                <div class="pt-4">
                    <h3 class="px-3 text-xs font-semibold uppercase text-slate-500 tracking-wider">Actions</h3>
                    <div class="mt-2 p-2">
                        <a href="{{ route('projects.create') }}" class="flex items-center justify-center w-full px-3 py-2 text-slate-700 border border-slate-300 hover:bg-slate-50 rounded-md">
                           <svg class="w-5 h-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-sm font-medium">New Project</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Plan Usage -->
            <div class="mt-auto p-4">
                <div class="bg-slate-50 rounded-lg p-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-semibold">Pro Plan</span>
                        <span class="text-sm font-medium text-slate-600">7/10 projects used</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-1.5"><div class="bg-blue-600 h-1.5 rounded-full" style="width: 70%"></div></div>
                </div>
            </div>
        </aside>
        <!-- ==== Left Sidebar End ==== -->

        <!-- ==== Main Content Start ==== -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="h-16 flex items-center justify-between bg-white border-b border-slate-200 px-4 sm:px-6">
                <div></div>
                <div class="flex items-center space-x-2">
                    <button class="flex items-center space-x-2">
                        <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User avatar">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </header>

            <!-- Main area -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8">
<!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Projects <span class="mx-1 text-slate-400">/</span> {{ $project->title }} <span class="mx-1 text-slate-400">/</span> <span class="text-slate-700 font-semibold">Edit Project</span>
                        </p>
                        <h1 class="text-3xl font-bold text-slate-800 mt-2">Project Settings</h1>
                    </div>
                </div>

                <!-- Main grid -->
                <form method="POST" action="{{ route('projects.update', $project) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                    <!-- Left Column (Form) -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- General Settings Card -->
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-50 rounded-lg text-blue-500">
                                    <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-1.007 1.11-1.226m-2.22 2.452a11.95 11.95 0 00-6.868 6.868c-1.226.55-2.22 1.66-2.452 2.9m11.532-9.32a11.95 11.95 0 00-9.32 11.532c.542.09 1.007.56 1.226 1.11m9.32-2.452a11.95 11.95 0 00-6.868-6.868c-1.226-.55-2.22-1.66-2.452-2.9M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" /></svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold">General Settings</h2>
                                    <p class="text-sm text-slate-500">Update your project information and visibility settings.</p>
                                </div>
                            </div>
                            <div class="mt-6 space-y-6">
                                <div>
                                    <label for="title" class="text-sm font-medium text-slate-700">Project Name</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" placeholder="Enter project name" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4">
                                    @error('title')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="description" class="text-sm font-medium text-slate-700">Project Description</label>
                                    <textarea name="description" id="description" rows="5" placeholder="Describe your project goals and objectives" class="mt-0.5 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 pr-4 pl-4">{{ old('description', $project->description) }}</textarea>
                                    <p class="mt-2 text-xs text-slate-500">Keep it concise and clear for the developers.</p>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="due_date" class="text-sm font-medium text-slate-700">Deadline</label>
                                        <div class="relative mt-1">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', $project->due_date) }}" class="block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pl-10 pr-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end space-x-3">
                                <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">
                                    Cancel
                                </a>
                                <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                    
                    <!-- Right Column (Members) - Separate form for adding members -->
                    <div class="lg:col-span-1">
                        <div class="bg-white p-6 rounded-lg shadow-sm space-y-6 sticky top-8">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-50 rounded-lg text-blue-500">
                                    <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.518 2.72a3 3 0 01-4.682-2.72 9.094 9.094 0 013.741-.479m7.518 2.72c.873.115 1.77.22 2.69.22a8.962 8.962 0 008.962-8.962c0-4.939-4.023-8.962-8.962-8.962s-8.962 4.023-8.962 8.962c0 1.171.223 2.292.637 3.345m12.139.973c.545.283 1.145.426 1.763.426a3.375 3.375 0 003.375-3.375c0-1.862-1.513-3.375-3.375-3.375s-3.375 1.513-3.375 3.375c0 .618.143 1.218.426 1.763m-12.139-.973c-.545.283-1.145.426-1.763.426a3.375 3.375 0 01-3.375-3.375c0-1.862 1.513-3.375 3.375-3.375s3.375 1.513 3.375 3.375c0 .618-.143 1.218-.426 1.763" /></svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold">Project Members</h2>
                                    <p class="text-sm text-slate-500">Manage who has access to this project.</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Invite team members</p>
                                <form method="POST" action="{{ route('projects.collaborator.add', $project) }}" class="mt-2">
                                    @csrf
                                    <div class="flex items-center space-x-2">
                                        <div class="relative flex-grow">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.877 9.877 0 0010 18c2.296 0 4.47-1.07 6.125-2.095a1.23 1.23 0 00.41-1.412A9.87 9.87 0 0010 12.5c-2.295 0-4.47 1.07-6.125 1.993z" /></svg>
                                            </div>
                                            <input type="text" name="user_id" placeholder="Enter email to invite..." class="block w-full rounded-md border border-slate-300 pl-10 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2" autocomplete="off">
                                        </div>
                                        <button type="submit" class="flex-shrink-0 h-9 w-9 flex items-center justify-center rounded-full bg-blue-600 text-white hover:bg-blue-700">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                        </button>
                                    </div>
                                    @error('user_id')
                                            <p class="mt-2 text-sm text-red-600 font-medium text-left">{{ $message }}</p>
                                            @enderror
                                    @if(session()->has('error'))
                                    <p class="mt-2 text-sm text-red-600 font-medium text-left">{{ session('error') }}</p>
                                    @endif
                                    @if(session()->has('success'))
                                    <p class="mt-2 text-sm text-green-600 font-medium text-left">{{ session('success') }}</p>
                                    @endif
                                </form>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Active members</p>
                                @if($project->createdBy || $project->collaborators->count() > 0)
                                <ul class="mt-3 space-y-3 max-h-48 overflow-y-auto">
                                    @if($project->createdBy)
                                    <li class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $project->createdBy->profile_photo_url }}" alt="{{ $project->createdBy->name }}">
                                            <div class="ml-3">
                                                <p class="text-sm font-semibold">{{ $project->createdBy->name }}</p>
                                                <p class="text-xs text-slate-500">Owner</p>
                                            </div>
                                        </div>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Owner</span>
                                    </li>
                                    @endif
                                    @foreach($project->collaborators as $collaborator)
                                    <li class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $collaborator->profile_photo_url }}" alt="{{ $collaborator->name }}">
                                            <div class="ml-3">
                                                <p class="text-sm font-semibold">{{ $collaborator->name }}</p>
                                                <p class="text-xs text-slate-500">{{ $collaborator->pivot->role ?? 'Member' }}</p>
                                            </div>
                                        </div>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{ $collaborator->pivot->role ?? 'Member' }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <div class="mt-3 flex flex-col items-center justify-center py-4 text-center">
                                    <svg class="h-8 w-8 text-slate-400 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                    <p class="text-sm text-slate-500">No members yet</p>
                                    <p class="text-xs text-slate-400">Invite team members to collaborate</p>
                                </div>
                                @endif
                            </div>
                            <div class="bg-slate-50 p-3 rounded-lg flex items-start space-x-3">
                                <svg class="h-5 w-5 flex-shrink-0 mt-0.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <p class="text-xs text-slate-600">Members can view and contribute to all tasks within this project.</p>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <footer class="mt-12">
                    <div class="py-6 border-t border-slate-200 flex items-center justify-between">
                         <p class="text-sm text-slate-500">
                            <strong>DevTrack</strong> &copy; 2024 Startup OS Inc.
                        </p>
                        <div class="flex items-center space-x-6">
                            <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Privacy</a>
                            <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Terms</a>
                            <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Support</a>
                            <a href="#" class="text-sm text-slate-500 hover:text-slate-700">API Docs</a>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>
</body>
</html>
