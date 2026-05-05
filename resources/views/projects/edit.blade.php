<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Settings - DevTrack</title>
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
                <a href="#" class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-md">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
                    <span class="text-sm font-medium">Projects</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
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
                <!-- Page Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Projects <span class="mx-1 text-slate-400">/</span> Mobile App Redesign <span class="mx-1 text-slate-400">/</span> <span class="text-slate-700 font-semibold">Edit Project</span>
                        </p>
                        <h1 class="text-3xl font-bold text-slate-800 mt-2">Project Settings</h1>
                    </div>
                    <div class="flex items-center space-x-3 mt-4 sm:mt-0">
                        <button type="button" class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none">
                            <svg class="w-5 h-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                            Cancel
                        </button>
                        <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5m-13.5-3.75h13.5" /></svg>
                            Save Changes
                        </button>
                    </div>
                </div>

                <!-- Main grid -->
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
                                    <label for="project-name" class="text-sm font-medium text-slate-700">Project Name</label>
                                    <input type="text" id="project-name" value="Mobile App Redesign" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="description" class="text-sm font-medium text-slate-700">Project Description</label>
                                    <textarea id="description" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">Comprehensive redesign of the core mobile application to improve user engagement and accessibility. This project includes new UI/UX components, optimized navigation, and performance improvements.</textarea>
                                    <p class="mt-2 text-xs text-slate-500">Keep it concise and clear for the developers.</p>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="deadline" class="text-sm font-medium text-slate-700">Deadline</label>
                                        <div class="relative mt-1">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <input type="date" id="deadline" value="2024-12-31" class="block w-full rounded-md border-slate-300 pl-10 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-slate-700">Priority Status</label>
                                        <div class="mt-1 flex items-center space-x-2 bg-slate-100 p-1 rounded-lg w-min">
                                            <button class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-700 rounded-md">High</button>
                                            <button class="px-3 py-1 text-sm font-medium text-slate-600 hover:bg-white rounded-md">Medium</button>
                                            <button class="px-3 py-1 text-sm font-medium text-slate-600 hover:bg-white rounded-md">Low</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Danger Zone Card -->
                        <div class="bg-red-50/50 border border-red-200 p-6 rounded-lg">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center text-red-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126z" /></svg>
                                </div>
                                <div>
                                    <h2 class="text-lg font-semibold text-red-800">Danger Zone</h2>
                                    <p class="text-sm text-red-700">Irreversible actions for this project.</p>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-red-200 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-slate-800">Archive Project</p>
                                        <p class="text-sm text-slate-500">Move this project to archives. It can be restored later.</p>
                                    </div>
                                    <button class="rounded-md border border-slate-300 bg-white px-3 py-1.5 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">Archive Project</button>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-slate-800">Delete Permanently</p>
                                        <p class="text-sm text-slate-500">All tasks, files, and activity will be permanently erased.</p>
                                    </div>
                                    <button class="rounded-md border border-transparent bg-red-600 px-3 py-1.5 text-sm font-medium text-white shadow-sm hover:bg-red-700">Delete Project</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (Members) -->
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
                               <div class="flex items-center space-x-2 mt-2">
                                   <div class="relative flex-grow">
                                       <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.877 9.877 0 0010 18c2.296 0 4.47-1.07 6.125-2.095a1.23 1.23 0 00.41-1.412A9.87 9.87 0 0010 12.5c-2.295 0-4.47 1.07-6.125 1.993z" /></svg>
                                       </div>
                                       <input type="text" placeholder="Search by name or email..." class="block w-full rounded-md border-slate-300 pl-10 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                   </div>
                                   <button class="flex-shrink-0 h-9 w-9 flex items-center justify-center rounded-full bg-blue-600 text-white hover:bg-blue-700">
                                       <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                   </button>
                               </div>
                           </div>
                           <div>
                               <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Active members (4)</p>
                               <ul class="mt-3 space-y-3">
                                   <li class="flex items-center justify-between">
                                       <div class="flex items-center">
                                           <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Alex Rivera">
                                           <div class="ml-3">
                                               <p class="text-sm font-semibold">Alex Rivera</p>
                                               <p class="text-xs text-slate-500">Project Lead</p>
                                           </div>
                                       </div>
                                       <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Owner</span>
                                   </li>
                                   <li class="flex items-center">
                                       <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Sarah Chen">
                                       <div class="ml-3">
                                           <p class="text-sm font-semibold">Sarah Chen</p>
                                           <p class="text-xs text-slate-500">Lead UI Designer</p>
                                       </div>
                                   </li>
                                   <li class="flex items-center">
                                       <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1531384441138-2736e62e0919?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Marcus Thorne">
                                       <div class="ml-3">
                                           <p class="text-sm font-semibold">Marcus Thorne</p>
                                           <p class="text-xs text-slate-500">Senior Backend Developer</p>
                                       </div>
                                   </li>
                                   <li class="flex items-center">
                                       <img class="h-8 w-8 rounded-full object-cover" src="https://images.unsplash.com/photo-1550525811-e5869105332c?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Elena Rodriguez">
                                       <div class="ml-3">
                                           <p class="text-sm font-semibold">Elena Rodriguez</p>
                                           <p class="text-xs text-slate-500">QA Engineer</p>
                                       </div>
                                   </li>
                               </ul>
                           </div>
                           <div class="bg-slate-50 p-3 rounded-lg flex items-start space-x-3">
                               <svg class="h-5 w-5 flex-shrink-0 mt-0.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                               <p class="text-xs text-slate-600">Members can view and contribute to all tasks within this project.</p>
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
