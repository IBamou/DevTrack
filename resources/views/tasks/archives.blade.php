<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archived Tasks - DevTrack</title>
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
        body { min-height: 100vh; }
        .h-screen { min-height: 100vh; height: auto; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900 antialiased">

    <div class="flex h-screen bg-slate-50">
        <!-- ==== Left Sidebar Start ==== -->
        <aside class="hidden lg:flex w-64 flex-shrink-0 bg-white border-r border-slate-200 flex-col">
            <!-- Logo -->
            <div class="h-16 flex items-center px-4">
                 <a href="#" class="flex-shrink-0 flex items-center space-x-2">
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
                <a href="#" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                    <span class="text-sm font-medium">Projects</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-md">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                    <span class="text-sm font-medium">Archives</span>
                </a>
                <div class="pt-4">
                    <h3 class="px-3 text-xs font-semibold uppercase text-slate-500 tracking-wider">Actions</h3>
                    <div class="mt-2 p-2">
                        <a href="#" class="flex items-center justify-center w-full px-3 py-2 text-slate-700 border border-slate-300 hover:bg-slate-50 rounded-md">
                           <svg class="w-5 h-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-sm font-medium">New Project</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Plan Usage -->
            <div class="mt-auto p-4">
                <div class="bg-slate-100 rounded-lg p-4">
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
                <div class="mb-8">
                    <p class="text-sm font-medium text-slate-500">Archives <span class="mx-1 text-slate-400">›</span> <span class="text-slate-700 font-semibold">Archived Tasks</span></p>
                    <h1 class="text-3xl font-bold text-slate-800 mt-2">Archived Tasks</h1>
                    <p class="mt-1 text-slate-600">A list of all tasks that have been archived from active projects.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-sm p-5 flex items-center"><div class="p-3 rounded-full bg-blue-100 text-blue-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Total Tasks Archived</p><p class="text-2xl font-bold">347</p></div></div>
                    <div class="bg-white rounded-lg shadow-sm p-5 flex items-center"><div class="p-3 rounded-full bg-slate-100 text-slate-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Oldest Task</p><p class="text-2xl font-bold">11 Months Ago</p></div></div>
                    <div class="bg-white rounded-lg shadow-sm p-5 flex items-center"><div class="p-3 rounded-full bg-slate-100 text-slate-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Most Archived From</p><p class="text-2xl font-bold truncate">Project Phoenix</p></div></div>
                </div>

                <!-- Task List -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-4 border-b border-slate-200">
                        <div class="relative w-full max-w-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            </div>
                            <input type="text" class="block w-full bg-slate-50 border-slate-200 rounded-md pl-10 pr-3 py-2 text-sm placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" placeholder="Search tasks...">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 font-medium text-left">Task</th>
                                    <th class="px-6 py-3 font-medium text-left">Project</th>
                                    <th class="px-6 py-3 font-medium text-left">Archived By</th>
                                    <th class="px-6 py-3 font-medium text-left">Date Archived</th>
                                    <th class="px-6 py-3 font-medium text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-800">Finalize v1 API Documentation</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-600">Project Phoenix</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <span class="ml-2 text-slate-600">Alex Rivera</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-500">Mar 15, 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-4">
                                        <button class="font-medium text-blue-600 hover:text-blue-800">Restore</button>
                                        <button class="font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-800">Create new user onboarding flow mockups</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-600">Mobile App v2.0</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <span class="ml-2 text-slate-600">Sarah Chen</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-500">Mar 12, 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-4">
                                        <button class="font-medium text-blue-600 hover:text-blue-800">Restore</button>
                                        <button class="font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-800">Setup CI/CD pipeline for staging</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-600">Project Phoenix</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <span class="ml-2 text-slate-600">John Doe</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-500">Feb 28, 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-4">
                                        <button class="font-medium text-blue-600 hover:text-blue-800">Restore</button>
                                        <button class="font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-800">Draft Q2 Marketing Campaign Brief</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-600">Marketing Website</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <span class="ml-2 text-slate-600">Jane Smith</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-slate-500">Feb 25, 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-4">
                                        <button class="font-medium text-blue-600 hover:text-blue-800">Restore</button>
                                        <button class="font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 border-t border-slate-200 flex items-center justify-between">
                        <p class="text-sm text-slate-500">Showing 1 to 4 of 347 results</p>
                        <div class="flex items-center space-x-2">
                             <button class="px-3 py-1 text-sm font-medium border border-slate-300 rounded-md bg-white hover:bg-slate-50" disabled>&larr; Previous</button>
                             <button class="px-3 py-1 text-sm font-medium border border-slate-300 rounded-md bg-white hover:bg-slate-50">Next &rarr;</button>
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
