<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DevTrack</title>
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
<body class="bg-slate-100 font-sans text-slate-900 antialiased">

    <div class="flex h-screen bg-slate-100">
        <!-- ==== Left Sidebar Start ==== -->
        <aside class="hidden lg:flex w-64 flex-shrink-0 bg-white border-r border-slate-200 flex-col">
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
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 bg-blue-50 text-blue-700 rounded-md">
                    <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a href="{{ route('projects.index') }}" class="flex items-center px-3 py-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900 rounded-md">
                    <svg class="h-6 w-6 mr-3 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
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
                <div class="mb-8">
                    <h1 class="text-3xl font-bold">Welcome back, Alex</h1>
                    <p class="text-slate-500 mt-1">Here's what's happening with your projects today.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center"><div class="p-3 rounded-full bg-blue-100 text-blue-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Active Projects</p><p class="text-2xl font-bold">12</p></div></div>
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center"><div class="p-3 rounded-full bg-green-100 text-green-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Tasks Completed</p><p class="text-2xl font-bold">128</p></div></div>
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center"><div class="p-3 rounded-full bg-red-100 text-red-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Critical Issues</p><p class="text-2xl font-bold">3</p></div></div>
                    <div class="bg-white rounded-lg shadow-sm p-6 flex items-center"><div class="p-3 rounded-full bg-yellow-100 text-yellow-600"><svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div><div class="ml-4"><p class="text-sm text-slate-500">Upcoming Deadlines</p><p class="text-2xl font-bold">5</p></div></div>
                </div>

                <!-- Active Projects -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Active Projects</h2>
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center">
                            View All Projects <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white rounded-lg shadow-sm p-5"><div class="flex justify-between items-start"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">Development</span><button class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></button></div><h3 class="text-lg font-semibold mt-2">Project Phoenix</h3><p class="text-sm text-slate-600 mt-1">Re-platforming the legacy CRM system to a modern microservices architecture.</p><div class="mt-4"><div class="flex justify-between text-sm mb-1"><span class="font-medium text-slate-600">Progress</span><span class="font-semibold">65%</span></div><div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-blue-600 h-2 rounded-full" style="width: 65%"></div></div></div><div class="mt-4 flex justify-between items-center"><div class="flex -space-x-2"><img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="A"><img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="B"><img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="C"></div><span class="text-sm text-slate-500 flex items-center"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>16/24 Tasks</span></div></div>
                        <div class="bg-white rounded-lg shadow-sm p-5"><div class="flex justify-between items-start"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">Design</span><button class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></button></div><h3 class="text-lg font-semibold mt-2">Mobile App v2.0</h3><p class="text-sm text-slate-600 mt-1">Redesigning the user experience and adding biometrics authentication.</p><div class="mt-4"><div class="flex justify-between text-sm mb-1"><span class="font-medium text-slate-600">Progress</span><span class="font-semibold">32%</span></div><div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-blue-600 h-2 rounded-full" style="width: 32%"></div></div></div><div class="mt-4 flex justify-between items-center"><div class="flex -space-x-2"><img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="A"><img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869105332c?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="B"></div><span class="text-sm text-slate-500 flex items-center"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>4/12 Tasks</span></div></div>
                        <div class="bg-white rounded-lg shadow-sm p-5"><div class="flex justify-between items-start"><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Marketing</span><button class="text-slate-400 hover:text-slate-600"><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" /></svg></button></div><h3 class="text-lg font-semibold mt-2">Marketing Website</h3><p class="text-sm text-slate-600 mt-1">New landing pages for the Q4 product launches and seasonal campaigns.</p><div class="mt-4"><div class="flex justify-between text-sm mb-1"><span class="font-medium text-slate-600">Progress</span><span class="font-semibold">90%</span></div><div class="w-full bg-slate-200 rounded-full h-2"><div class="bg-blue-600 h-2 rounded-full" style="width: 90%"></div></div></div><div class="mt-4 flex justify-between items-center"><div class="flex -space-x-2"><img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1532074205216-d0e1f4b87368?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="A"></div><span class="text-sm text-slate-500 flex items-center"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>16/18 Tasks</span></div></div>
                    </div>
                </div>

                <!-- My Tasks -->
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold">My Tasks</h2>
                                <p class="text-sm text-slate-500 mt-1">Recent deliverables assigned specifically to you.</p>
                            </div>
                            <button class="flex items-center px-3 py-2 text-sm font-medium bg-white border border-slate-300 rounded-md shadow-sm hover:bg-slate-50">
                                <svg class="h-5 w-5 mr-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.033a.75.75 0 01-1.5 0v-3.033a2.25 2.25 0 00-.659-1.59L3.372 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" /></svg>
                                Filter
                            </button>
                        </div>
                        <div class="mt-4 flex items-center space-x-1 border-b border-slate-200">
                            <button class="px-3 py-2 text-sm font-medium border-b-2 border-blue-600 text-blue-600">All Tasks</button>
                            <button class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-slate-700">To Do</button>
                            <button class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-slate-700">In Progress</button>
                            <button class="px-3 py-2 text-sm font-medium text-slate-500 hover:text-slate-700">Completed</button>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-5 gap-4 px-6 py-3 text-xs font-semibold uppercase text-slate-500 border-b border-slate-200">
                            <div class="col-span-2">Task Name</div>
                            <div>Priority</div>
                            <div>Status</div>
                            <div class="text-right">Due Date</div>
                        </div>
                        <div class="divide-y divide-slate-100">
                           <div class="grid grid-cols-5 gap-4 px-6 py-4 items-center text-sm"><div class="col-span-2 font-medium">Finalize API Documentation</div><div>Project Phoenix</div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">High</span></div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-700">In Progress</span></div><div class="text-right text-slate-500">Oct 24</div></div>
                           <div class="grid grid-cols-5 gap-4 px-6 py-4 items-center text-sm"><div class="col-span-2 font-medium">Review UI Mockups for v2.0</div><div>Mobile App v2.0</div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Medium</span></div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">Review</span></div><div class="text-right text-slate-500">Oct 25</div></div>
                           <div class="grid grid-cols-5 gap-4 px-6 py-4 items-center text-sm"><div class="col-span-2 font-medium">Fix Auth Redirect Bug</div><div>Project Phoenix</div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">High</span></div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700">Todo</span></div><div class="text-right text-slate-500">Oct 22</div></div>
                           <div class="grid grid-cols-5 gap-4 px-6 py-4 items-center text-sm"><div class="col-span-2 font-medium">Optimise Image Assets</div><div>Marketing Website</div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Low</span></div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Done</span></div><div class="text-right text-slate-500">Oct 20</div></div>
                           <div class="grid grid-cols-5 gap-4 px-6 py-4 items-center text-sm"><div class="col-span-2 font-medium">Internal Team Standup</div><div>Project Phoenix</div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Medium</span></div><div><span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700">Todo</span></div><div class="text-right text-slate-500">Oct 23</div></div>
                        </div>
                    </div>
                    <div class="p-4 border-t border-slate-200 text-center">
                        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800">View all tasks assigned to me</a>
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
