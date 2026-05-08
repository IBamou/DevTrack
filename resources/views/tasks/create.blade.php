<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task - DevTrack</title>
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
        <aside class="hidden lg:flex w-64 flex-shrink-0 bg-white border-r border-slate-200 flex-col">
            <div class="h-16 flex items-center px-4">
                <a href="{{ route('projects.index') }}" class="flex-shrink-0 flex items-center space-x-2">
                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11.917 15.242 6.023 9.478l.083-.083L12 3l5.977 6.395-.083.083-5.894 5.764Z" fill="currentColor"/>
                        <path d="m6.023 15.325 5.894 5.761 5.894-5.761-.083.083-5.811 5.681-5.811-5.681.083-.083Z" fill="currentColor"/>
                    </svg>
                    <span class="text-2xl font-bold text-slate-800">DevTrack</span>
                </a>
            </div>
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
                    <span class="text-sm font-medium">Projects Archives</span>
                </a>
                <a href="{{ route('tasks.archives') }}" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                    <span class="text-sm font-medium">Tasks Archives</span>
                </a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 flex items-center justify-between bg-white border-b border-slate-200 px-4 sm:px-6">
                <div></div>
                <div class="flex items-center space-x-2">
                    <button class="flex items-center space-x-2">
                        <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User avatar">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 lg:p-8">
                <div>
                    <p class="text-sm font-medium text-slate-500">{{ $project->title }} <span class="mx-1 text-slate-400">›</span> Create New Task</p>
                    <h1 class="text-3xl font-bold text-slate-800 mt-2">Add a New Task</h1>
                    <p class="mt-1 text-slate-600">Create a new task for this project.</p>
                </div>

                <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-50 rounded-lg">
                                    <svg class="h-7 w-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold">Task Details</h2>
                                    <p class="text-sm text-slate-500">Enter the task information below.</p>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('projects.tasks.store', $project) }}" class="mt-6 space-y-6">
                                @csrf
                                <div>
                                    <label for="title" class="text-sm font-medium text-slate-700">Task Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter task title" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4" required>
                                    @error('title')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-xs text-slate-500">A clear, concise title for this task.</p>
                                </div>
                                <div>
                                    <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                                    <textarea name="description" id="description" rows="5" placeholder="Describe the task details" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-6">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-xs text-slate-500">Provide details about what needs to be done.</p>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="status" class="text-sm font-medium text-slate-700">Status</label>
                                        <select name="status" id="status" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4">
                                            <option value="todo" {{ old('status') == 'todo' ? 'selected' : '' }}>To Do</option>
                                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="review" {{ old('status') == 'review' ? 'selected' : '' }}>Review</option>
                                            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="priority" class="text-sm font-medium text-slate-700">Priority</label>
                                        <select name="priority" id="priority" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4">
                                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                            <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="due_date" class="text-sm font-medium text-slate-700">Due Date</label>
                                        <div class="relative mt-1">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" class="block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pl-10 pr-4">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-xs text-slate-500">* Required fields must be completed.</p>
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('projects.show', $project) }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
                                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Create Task
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-blue-50 p-6 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.5 13.5L18 15l1.5-1.5" />
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-800">Pro Tips</h3>
                            </div>
                            <ol class="mt-4 space-y-4">
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">1</span>
                                    <div class="ml-3 text-sm">
                                        <p class="font-semibold text-slate-700">Be specific.</p>
                                        <p class="text-slate-600 mt-1">Write a clear title that explains what needs to be done.</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">2</span>
                                    <div class="ml-3 text-sm">
                                        <p class="font-semibold text-slate-700">Set priority wisely.</p>
                                        <p class="text-slate-600 mt-1">Use High priority for critical tasks that need immediate attention.</p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <footer class="mt-12">
                    <div class="py-6 border-t border-slate-200 flex items-center justify-between">
                        <p class="text-sm text-slate-500">
                            <strong>DevTrack</strong> &copy; 2024 Startup OS Inc.
                        </p>
                    </div>
                </footer>
            </main>
        </div>
    </div>
</body>
</html>