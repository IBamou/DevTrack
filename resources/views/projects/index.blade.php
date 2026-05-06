<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - DevTrack</title>
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
        .avatar-group > * {
            border: 2px solid white;
        }
    </style>
</head>
<body class="bg-slate-100 font-sans text-slate-900">

    <div class="flex h-screen bg-slate-100">
        <!-- Sidebar -->
        <aside class="w-64 flex-shrink-0 bg-white border-r border-slate-200 flex flex-col">
            <!-- Logo -->
            <div class="h-16 flex items-center px-4">
                 <a href="{{ route('dashboard') }}" class="flex-shrink-0 flex items-center space-x-2">
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
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-md">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                    <span class="text-sm font-medium">Projects</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
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
                    <div class="w-full bg-slate-200 rounded-full h-1.5">
                        <div class="bg-blue-600 h-1.5 rounded-full" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="h-16 flex items-center justify-between bg-white border-b border-slate-200 px-6">
                <div class="relative w-full max-w-xs">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <input type="text" class="block w-full bg-slate-100 border-transparent rounded-md pl-10 pr-3 py-2 text-sm placeholder-slate-500 focus:outline-none focus:bg-white focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search tasks or projects...">
                </div>
                <div class="flex items-center space-x-5">
                    <button class="text-slate-500 hover:text-slate-700">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                    </button>
                    <button class="flex items-center space-x-2">
                        <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User avatar">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-bold">Projects</h1>
                        <p class="text-slate-500 mt-1">Manage and track all your team's active workspaces.</p>
                    </div>
                    <a href="{{ route('projects.create') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="h-5 w-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" /></svg>
                        New Project
                    </a>
                </div>

                <!-- Filters -->
                <form method="GET" action="{{ route('projects.index') }}" class="flex flex-col sm:flex-row items-center justify-between mb-6 space-y-3 sm:space-y-0">
                    <div class="flex items-center space-x-1 bg-slate-200 p-1 rounded-lg">
                        <button type="submit" name="filter" value="" class="px-3 py-1 text-sm font-medium bg-white rounded-md shadow">All</button>
                        <button type="submit" name="filter" value="active" class="px-3 py-1 text-sm font-medium text-slate-600 hover:text-slate-800">Active</button>
                        <button type="submit" name="filter" value="archived" class="px-3 py-1 text-sm font-medium text-slate-600 hover:text-slate-800">Archived</button>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="relative w-48">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" class="block w-full bg-white border-slate-300 rounded-md pl-10 pr-3 py-2 text-sm placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search projects...">
                        </div>
                        <select name="sort" onchange="this.form.submit()" class="flex items-center px-3 py-2 text-sm font-medium bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        </select>
                    </div>
                </form>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($projects as $project)
                    <div class="bg-white rounded-lg shadow p-5 flex flex-col">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center">
                                <input type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <div class="ml-3">
                                    <p class="text-xs uppercase font-semibold text-slate-500">{{ $project->tasks->first()?->priority ?? 'General' }}</p>
                                    <a href="{{ route('projects.show', $project) }}" class="text-lg font-semibold text-slate-800 hover:text-blue-600">{{ $project->title }}</a>
                                </div>
                            </div>
                            <button class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></button>
                        </div>
                        <p class="mt-2 text-sm text-slate-600">{{ Str::limit($project->description, 80) }}</p>
                        <div class="mt-4">
                            <div class="flex justify-between text-sm mb-1">
                                <span class="font-medium text-slate-600">Progress</span>
                                <span class="font-semibold">{{ $project->progress }}%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-blue-600 h-2 rounded-full" style="width: {{ $project->progress }}%"></div></div>
                        </div>
                        <div class="mt-auto pt-4 flex justify-between items-end">
                            <div class="flex -space-x-2 avatar-group">
                                @foreach($project->collaborators->take(3) as $collaborator)
                                <img class="inline-block h-8 w-8 rounded-full" src="{{ $collaborator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($collaborator->name) }}" alt="Avatar">
                                @endforeach
                                @if($project->collaborators->count() > 3)
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 text-xs font-medium text-slate-600">+{{ $project->collaborators->count() - 3 }}</span>
                                @endif
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($project->status === 'healthy') bg-green-100 text-green-800
                                    @elseif($project->status === 'at_risk') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($project->status) }}
                                </span>
                                <p class="text-xs text-slate-500 mt-1 flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>{{ $project->due_date ? \Carbon\Carbon::parse($project->due_date)->format('M d, Y') : 'No due date' }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-12 text-center">
                        <svg class="h-12 w-12 text-slate-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-slate-900 mb-1">No projects yet</h3>
                        <p class="text-slate-500 mb-4">Create your first project to get started</p>
                        <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            New Project
                        </a>
                    </div>
                    @endforelse
                {{ $projects->links() }}
                </div>

                <!-- Stats Summary -->
                <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">Total Projects</p>
                            <p class="text-2xl font-bold">{{ $projects->total() }}</p>
                        </div>
                    </div>
                     <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">Healthy</p>
                            <p class="text-2xl font-bold">-</p>
                        </div>
                    </div>
                     <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">At Risk</p>
                            <p class="text-2xl font-bold">-</p>
                        </div>
                    </div>
                     <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">Delayed</p>
                            <p class="text-2xl font-bold">-</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">Total Projects</p>
                            <p class="text-2xl font-bold">12</p>
                        </div>
                    </div>
                     <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">Completed</p>
                            <p class="text-2xl font-bold">5</p>
                        </div>
                    </div>
                     <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">In Progress</p>
                            <p class="text-2xl font-bold">6</p>
                        </div>
                    </div>
                     <div class="bg-slate-50 rounded-lg p-4 flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-600">
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-slate-500">Delayed</p>
                            <p class="text-2xl font-bold">1</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="mt-12 text-center">
                    <div class="py-6 border-t border-slate-200 flex items-center justify-between">
                         <p class="text-sm text-slate-500">
                            <strong>DevTrack</strong> &copy; 2024 Startup OS Inc.
                        </p>
                        <div class="flex items-center space-x-6">
                            <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-slate-700">Privacy</a>
                            <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-slate-700">Terms</a>
                            <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-slate-700">Support</a>
                            <a href="{{ route('dashboard') }}" class="text-sm text-slate-500 hover:text-slate-700">API Docs</a>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>
</body>
</html>
