<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - DevTrack</title>
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
                    <p class="text-sm font-medium text-slate-500">{{ $task_record->project->title }} <span class="mx-1 text-slate-400">›</span> Edit Task</p>
                    <h1 class="text-3xl font-bold text-slate-800 mt-2">Edit Task</h1>
                    <p class="mt-1 text-slate-600">Update task details for #DT-{{ $task_record->id }}</p>
                </div>

                <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-50 rounded-lg">
                                    <svg class="h-7 w-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold">Task Details</h2>
                                    <p class="text-sm text-slate-500">Update the task information below.</p>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('projects.tasks.update', ['project' => $task_record->project->id, 'task_record' => $task_record->id]) }}" class="mt-6 space-y-6">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="title" class="text-sm font-medium text-slate-700">Task Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $task_record->title) }}" placeholder="Enter task title" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4" required>
                                    @error('title')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                                    <textarea name="description" id="description" rows="5" placeholder="Describe the task details" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-6">{{ old('description', $task_record->description) }}</textarea>
                                    @error('description')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="status" class="text-sm font-medium text-slate-700">Status</label>
                                        <select name="status" id="status" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4">
                                            <option value="todo" {{ $task_record->status == 'todo' ? 'selected' : '' }}>To Do</option>
                                            <option value="in_progress" {{ $task_record->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="review" {{ $task_record->status == 'review' ? 'selected' : '' }}>Review</option>
                                            <option value="done" {{ $task_record->status == 'done' ? 'selected' : '' }}>Done</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="priority" class="text-sm font-medium text-slate-700">Priority</label>
                                        <select name="priority" id="priority" class="mt-1 block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pr-4 pl-4">
                                            <option value="low" {{ $task_record->priority == 'low' ? 'selected' : '' }}>Low</option>
                                            <option value="medium" {{ $task_record->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="high" {{ $task_record->priority == 'high' ? 'selected' : '' }}>High</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="due_date" class="text-sm font-medium text-slate-700">Due Date</label>
                                        <div class="relative mt-1">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <input type="date" name="due_date" id="due_date" value="{{ $task_record->due_date }}" class="block w-full rounded-md border border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-3 pl-10 pr-4">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                                    <button type="button" onclick="document.getElementById('deleteForm').submit()" class="rounded-md border border-transparent bg-red-100 px-4 py-2 text-sm font-medium text-red-700 hover:bg-red-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2">Delete Task</button>
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('projects.show', $task_record->project->id) }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
                                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <form id="deleteForm" method="POST" action="{{ route('projects.tasks.archive', ['project' => $task_record->project->id, 'task_record' => $task_record->id]) }}" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h3 class="text-xs uppercase font-semibold text-slate-500 tracking-wider">Task Info</h3>
                            <div class="mt-4 space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-slate-500">Task ID</span>
                                    <span class="text-sm font-medium text-slate-800">#DT-{{ $task_record->id }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-slate-500">Created</span>
                                    <span class="text-sm font-medium text-slate-800">{{ $task_record->created_at->format('M d, Y') }}</span>
                                </div>
                                @if($task_record->updated_at)
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-slate-500">Updated</span>
                                    <span class="text-sm font-medium text-slate-800">{{ $task_record->updated_at->format('M d, Y') }}</span>
                                </div>
                                @endif
                            </div>
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