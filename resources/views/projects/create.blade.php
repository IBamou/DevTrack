<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project - DevTrack</title>
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

            <!-- Main area -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8">
                <div>
                    <p class="text-sm font-medium text-slate-500">Projects <span class="mx-1 text-slate-400">›</span> Create New</p>
                    <h1 class="text-3xl font-bold text-slate-800 mt-2">Launch a New Project</h1>
                    <p class="mt-1 text-slate-600">Set up your team's workspace and start tracking progress.</p>
                </div>

                <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Form Column -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-50 rounded-lg">
                                    <svg class="h-7 w-7 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.828a4.5 4.5 0 01.707-2.122l2.121-2.121a6 6 0 017.38-5.84c.532.12.982.294 1.414.532l-2.828 2.828m-7.071 7.071l-2.121-2.121A4.5 4.5 0 016.928 6.928l-2.828-2.828a6 6 0 017.38-5.84c.532.12.982.294 1.414.532-4.281 1.77-6.883 6.83-5.289 11.211z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold">Project Details</h2>
                                    <p class="text-sm text-slate-500">Enter basic information to get started.</p>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('projects.store') }}" class="mt-6 space-y-6">
                                @csrf
                                <div>
                                    <label for="title" class="text-sm font-medium text-slate-700">Project Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" required>
                                    @error('title')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-xs text-slate-500">This will be the primary identifier for your project board.</p>
                                </div>
                                <div>
                                    <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-xs text-slate-500">Try to describe the primary objective in 1-2 sentences.</p>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="due_date" class="text-sm font-medium text-slate-700">Deadline</label>
                                        <div class="relative mt-1">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date') }}" class="block w-full rounded-md border-slate-300 pl-10 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between">
                                <p class="text-xs text-slate-500">* Required fields must be completed to launch.</p>
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('projects.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-800">Cancel</a>
                                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Create Project
                                    </button>
                                </div>
                            </div>
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

                    <!-- Sidebar Column -->
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
                                        <p class="font-semibold text-slate-700">Keep it concise.</p>
                                        <p class="text-slate-600 mt-1">Great project names are short and memorable (e.g., "Apollo Launch" vs "The Internal Marketing Website Project").</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">2</span>
                                    <div class="ml-3 text-sm">
                                        <p class="font-semibold text-slate-700">Define the goal.</p>
                                        <p class="text-slate-600 mt-1">Use the description to state exactly what success looks like for this specific project.</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <span class="flex-shrink-0 flex items-center justify-center h-6 w-6 rounded-full bg-blue-200 text-blue-700 text-sm font-bold">3</span>
                                    <div class="ml-3 text-sm">
                                        <p class="font-semibold text-slate-700">Realistic deadlines.</p>
                                        <p class="text-slate-600 mt-1">Setting a deadline helps the team prioritize. You can always adjust it later in settings.</p>
                                    </div>
                                </li>
                            </ol>
                            <a href="#" class="mt-6 block text-sm font-medium text-blue-600 hover:text-blue-700">View API Documentation for projects</a>
                        </div>

                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <h3 class="text-xs uppercase font-semibold text-slate-500 tracking-wider">Preview</h3>
                            <div class="mt-4 bg-slate-50 p-4 rounded-md border border-slate-200">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg font-bold">Q</div>
                                    <p class="font-semibold text-slate-800">Q3 Product Roadmap</p>
                                </div>
                                <div class="mt-4 space-y-1">
                                    <div class="flex justify-between items-center text-xs">
                                        <span>0 Tasks</span>
                                        <span>0% Done</span>
                                    </div>
                                    <div class="w-full bg-slate-200 rounded-full h-1.5"><div class="bg-blue-600 h-1.5 rounded-full" style="width: 0%"></div></div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-slate-200">
                                    <p class="text-xs uppercase font-semibold text-slate-400">Due Date</p>
                                    <p class="text-sm font-medium text-slate-600">September 30, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
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
        <!-- ==== Main Content End ==== -->
    </div>
</body>
</html>
