<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - DevTrack</title>

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
        html {
            font-size: 80%;
        }

        body {
            min-height: 100vh;
            margin: 0;
        }

        .h-screen {
            min-height: 100vh;
            height: auto;
        }

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

        .avatar-group>* {
            border: 2px solid white;
        }
    </style>
</head>

<body class="bg-slate-100 font-sans text-slate-900 antialiased">

    <div class="flex h-screen bg-slate-100">
        <!-- ==== Left Sidebar Start ==== -->
        <aside class="hidden lg:flex w-64 flex-shrink-0 bg-white border-r border-slate-200 flex-col">
            <!-- Logo -->
            <div class="h-16 flex items-center px-4">
                <a href="{{ route('projects.index') }}" class="flex-shrink-0 flex items-center space-x-2">
                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M11.917 15.242 6.023 9.478l.083-.083L12 3l5.977 6.395-.083.083-5.894 5.764Z"
                            fill="currentColor" />
                        <path d="m6.023 15.325 5.894 5.761 5.894-5.761-.083.083-5.811 5.681-5.811-5.681.083-.083Z"
                            fill="currentColor" />
                    </svg>
                    <span class="text-2xl font-bold text-slate-800">DevTrack</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-4 space-y-2">
                <h3 class="px-3 text-xs font-semibold uppercase text-slate-500 tracking-wider">Main Menu</h3>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                <a href="{{ route('projects.index') }}"
                    class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-md">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    <span class="text-sm font-medium">Projects</span>
                </a>

                <a href="{{ route('projects.archives') }}"
                    class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    <span class="text-sm font-medium">Archives</span>
                </a>

                <div class="pt-4">
                    <h3 class="px-3 text-xs font-semibold uppercase text-slate-500 tracking-wider">Actions</h3>
                    <div class="mt-2 p-2">
                        <a href="{{ route('projects.create') }}"
                            class="flex items-center justify-center w-full px-3 py-2 text-slate-700 border border-slate-300 hover:bg-slate-50 rounded-md">
                            <svg class="w-5 h-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
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
        <!-- ==== Left Sidebar End ==== -->

        <!-- ==== Main Content Start ==== -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="h-16 flex items-center justify-between bg-white border-b border-slate-200 px-4 sm:px-6">
                <div class="relative w-full max-w-xs">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text"
                        class="block w-full bg-slate-100 border-transparent rounded-md pl-10 pr-3 py-2 text-sm placeholder-slate-500 focus:outline-none focus:bg-white focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search tasks or projects...">
                </div>

                <div class="flex items-center space-x-5">
                    <button class="text-slate-500 hover:text-slate-700">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <button class="flex items-center space-x-2">
                        <img class="h-8 w-8 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="User avatar">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </header>

            <div class="flex-1 flex overflow-hidden">
                <!-- Main Board -->
                <main class="flex-1 flex flex-col overflow-y-auto">
                    <div class="px-6 py-4">
                        <!-- Project Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-xs uppercase font-semibold text-slate-500">
                                    PROJECTS <span class="mx-1">›</span>
                                    {{ strtoupper($project->title) }}
                                </p>
                                <h1 class="text-3xl font-bold text-slate-800 mt-1">{{ ucfirst($project->title) }}</h1>
                                <p class="flex items-center text-sm text-slate-500 mt-2">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Due:
                                    {{ $project->due_date ? \Carbon\Carbon::parse($project->due_date)->format('M d, Y') : 'No due date' }}
                                </p>
                            </div>

                            @can('create', [App\Models\Task::class, $project])
                            <div class="flex items-center space-x-2 mt-4 sm:mt-0">
                                <a href="{{ route('projects.tasks.create', $project) }}"
                                    class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700">
                                    <svg class="h-5 w-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                    Add Task
                                </a>
                            </div>
                            @endcan
                        </div>

                        <!-- Progress & Filters -->
                        <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center space-x-2 flex-wrap gap-y-2">
                                <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'all']) }}"
                                    class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'all' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">All</a>
                                <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'my']) }}"
                                    class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'my' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">My</a>
                                <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'todo']) }}"
                                    class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'todo' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">Todo</a>
                                <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'in_progress']) }}"
                                    class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'in_progress' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">In
                                    Progress</a>
                                <a href="{{ route('projects.show', ['project' => $project, 'filter' => 'done']) }}"
                                    class="px-3 py-1.5 text-sm font-medium rounded-md {{ ($filter ?? 'all') == 'done' ? 'bg-slate-800 text-white' : 'bg-white border border-slate-300 hover:bg-slate-50' }}">Done</a>
                            </div>

                            <div class="flex items-center space-x-3 mt-4 sm:mt-0">

                                <button id="teamBtn" onclick="toggleTeamPopup()"
                                    class="flex items-center px-3 py-1.5 text-sm font-medium bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                                    <svg class="h-5 w-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.877 9.877 0 0010 18c2.296 0 4.47-1.07 6.125-2.095a1.23 1.23 0 00.41-1.412A9.87 9.87 0 0010 12.5c-2.295 0-4.47 1.07-6.125 1.993z" />
                                    </svg>
                                    Team
                                </button>
                                <div class="flex -space-x-2 avatar-group">
                                    @foreach($project->collaborators->take(4) as $collaborator)
                                        <img class="inline-block h-8 w-8 rounded-full"
                                            src="{{ $collaborator->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($collaborator->name) }}"
                                            alt="Avatar">
                                    @endforeach

                                    @if($project->collaborators->count() > 4)
                                        <span
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-200 text-xs font-medium text-slate-700">+{{ $project->collaborators->count() - 4 }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Kanban Board Columns -->
                    <div class="flex-1 overflow-x-auto">
                        <div class="inline-grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-6 pb-6 min-w-max">

                            <!-- Todo Column -->
                            <div class="w-72">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-lg">Todo
                                        <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'todo')->count() }}</span>
                                    </h3>
                                    <button class="text-slate-400 hover:text-slate-600">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="space-y-4">
                                    @foreach($tasks->where('status', 'todo') as $task)
                                        <div class="bg-white rounded-lg shadow-sm p-4">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                                {{ $task->priority === 'high' ? 'bg-red-100 text-red-700' :
                                                   ($task->priority === 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-700') }}">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                            <p class="font-semibold text-slate-800 mt-2">{{ $task->title }}</p>
                                            <div class="flex items-center justify-between mt-4 text-sm text-slate-500">
                                                <div class="flex items-center space-x-2">
                                                    @if($task->assignee)
                                                        <img class="h-6 w-6 rounded-full"
                                                            src="{{ $task->assignee->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->assignee->name) }}"
                                                            alt="Avatar">
                                                    @endif
                                                    <span class="font-mono text-xs font-medium">#DT-{{ $task->id }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- In Progress Column -->
                            <div class="w-72">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-lg">In Progress
                                        <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'in_progress')->count() }}</span>
                                    </h3>
                                    <button class="text-slate-400 hover:text-slate-600">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="space-y-4">
                                    @foreach($tasks->where('status', 'in_progress') as $task)
                                        <div class="bg-white rounded-lg shadow-sm p-4">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                                {{ $task->priority === 'high' ? 'bg-red-100 text-red-700' :
                                                   ($task->priority === 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-700') }}">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                            <p class="font-semibold text-slate-800 mt-2">{{ $task->title }}</p>
                                            <div class="flex items-center justify-between mt-4 text-sm text-slate-500">
                                                <div class="flex items-center space-x-2">
                                                    @if($task->assignee)
                                                        <img class="h-6 w-6 rounded-full"
                                                            src="{{ $task->assignee->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->assignee->name) }}"
                                                            alt="Avatar">
                                                    @endif
                                                    <span class="font-mono text-xs font-medium">#DT-{{ $task->id }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Review Column -->
                            <div class="w-72">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-lg">Review
                                        <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'review')->count() }}</span>
                                    </h3>
                                    <button class="text-slate-400 hover:text-slate-600">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="space-y-4">
                                    @foreach($tasks->where('status', 'review') as $task)
                                        <div class="bg-white rounded-lg shadow-sm p-4">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                                {{ $task->priority === 'high' ? 'bg-red-100 text-red-700' :
                                                   ($task->priority === 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-700') }}">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                            <p class="font-semibold text-slate-800 mt-2">{{ $task->title }}</p>
                                            <div class="flex items-center justify-between mt-4 text-sm text-slate-500">
                                                <div class="flex items-center space-x-2">
                                                    @if($task->assignee)
                                                        <img class="h-6 w-6 rounded-full"
                                                            src="{{ $task->assignee->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->assignee->name) }}"
                                                            alt="Avatar">
                                                    @endif
                                                    <span class="font-mono text-xs font-medium">#DT-{{ $task->id }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Done Column -->
                            <div class="w-72">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-lg">Done
                                        <span class="text-sm text-slate-500 font-medium">{{ $tasks->where('status', 'done')->count() }}</span>
                                    </h3>
                                    <button class="text-slate-400 hover:text-slate-600">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="space-y-4">
                                    @foreach($tasks->where('status', 'done') as $task)
                                        <div class="bg-white rounded-lg shadow-sm p-4 border border-green-200">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700 mb-2">Completed</span>
                                            <p class="font-semibold text-slate-800 mt-2">{{ $task->title }}</p>
                                            <div class="flex items-center justify-between mt-4 text-sm text-slate-500">
                                                <div class="flex items-center space-x-2">
                                                    @if($task->assignee)
                                                        <img class="h-6 w-6 rounded-full"
                                                            src="{{ $task->assignee->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($task->assignee->name) }}"
                                                            alt="Avatar">
                                                    @endif
                                                    <span class="font-mono text-xs font-medium">#DT-{{ $task->id }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Team Members Popup Modal -->
    <div id="teamPopup" class="fixed inset-0 z-50 hidden" aria-hidden="true">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 transition-opacity" onclick="toggleTeamPopup()"></div>

        <!-- Popup Panel -->
        <div class="absolute right-0 top-0 h-full w-80 bg-white border-l border-slate-200 flex flex-col shadow-xl transform transition-transform duration-300 ease-in-out translate-x-full"
            id="teamPanel">
            <div class="p-6 h-full flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm uppercase font-semibold text-slate-500 tracking-wider">Project Members</h3>
                        <p class="text-sm text-slate-500 mt-1">Collaborators in this workspace</p>
                    </div>
                    <button onclick="toggleTeamPopup()" class="text-slate-400 hover:text-slate-600 p-1 rounded hover:bg-slate-100">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Dynamic Members List -->
                <ul class="mt-4 space-y-4 flex-1 overflow-y-auto">
                    @foreach($project->collaborators as $member)
                        <li class="flex items-center">
                            <img class="h-10 w-10 rounded-full object-cover"
                                src="{{ $member->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($member->name) }}"
                                alt="{{ $member->name }}">
                            <div class="ml-3">
                                <p class="font-semibold">{{ $member->name }}</p>
                                <p class="text-sm text-slate-500">{{ $member->email }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Invite Form -->
                <form action="{{ route('projects.collaborator.add', $project) }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-sm text-slate-600 mb-1">Invite by Email</label>
                        <input type="email" name="email" required
                               class="w-full px-3 py-2 border border-slate-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                               placeholder="member@example.com">
                    </div>
                    <button type="submit"
                            class="w-full flex items-center justify-center py-2.5 border border-dashed border-slate-300 rounded-lg text-sm text-slate-600 hover:border-slate-400 hover:text-slate-800">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Invite Member
                    </button>
                </form>

                <div class="mt-auto pt-6 border-t border-slate-200">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-slate-600">Storage used</span>
                        <span class="text-sm font-medium text-slate-600">2.4 GB / 5 GB</span>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-1.5">
                        <div class="bg-blue-600 h-1.5 rounded-full" style="width: 48%"></div>
                    </div>
                    <a href="#" class="block text-center mt-4 text-sm text-blue-600 font-medium hover:underline">Upgrade for more storage</a>
                </div>
            </div>
        </div>
    </div>

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

</body>
</html>
