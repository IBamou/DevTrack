<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTrack - Project Management</title>
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html { font-size: 80%; }
    </style>
</head>
<body class="bg-slate-100 font-sans text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b border-slate-200">
            <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
                <a href="{{ route('welcome') }}" class="flex items-center space-x-2">
                    <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11.917 15.242 6.023 9.478l.083-.083L12 3l5.977 6.395-.083.083-5.894 5.764Z" fill="currentColor"/>
                        <path d="m6.023 15.325 5.894 5.761 5.894-5.761-.083.083-5.811 5.681-5.811-5.681.083-.083Z" fill="currentColor"/>
                    </svg>
                    <span class="text-2xl font-bold text-slate-800">DevTrack</span>
                </a>
                <div class="flex items-center gap-6">
                    <a href="#features" class="text-sm text-slate-600 hover:text-slate-900">Features</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-slate-600 hover:text-slate-900">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">Sign Up</a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-1">
            <div class="max-w-6xl mx-auto px-4 py-16">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-1.5 bg-blue-50 rounded-full border border-blue-100 mb-6">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                        <span class="text-sm text-blue-700">Now in Public Beta</span>
                    </div>
                    <h1 class="text-5xl font-extrabold text-slate-900 mb-4">
                        Streamline Your <span class="text-blue-600">Project Workflow</span>
                    </h1>
                    <p class="text-xl text-slate-600 max-w-2xl mx-auto mb-8">
                        DevTrack brings your planning, task management, and team collaboration into one seamless workspace.
                    </p>
                    <div class="flex justify-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                                Get Started Free
                            </a>
                            <a href="{{ route('login') }}" class="px-6 py-3 border border-slate-300 text-slate-700 font-medium rounded-lg hover:bg-slate-50">
                                Login
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Dashboard Preview -->
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden mb-16">
                    <div class="bg-slate-50 border-b border-slate-200 px-4 py-3 flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        <span class="ml-4 text-sm text-slate-500">Dashboard Preview</span>
                    </div>
                    <div class="grid grid-cols-12" style="min-height: 300px;">
                        <!-- Sidebar -->
                        <div class="col-span-2 bg-slate-800 p-4 space-y-2">
                            <div class="h-6 bg-slate-700 rounded w-3/4"></div>
                            <div class="h-6 bg-slate-700/50 rounded w-1/2 mt-8"></div>
                            <div class="h-6 bg-slate-700/50 rounded w-1/2"></div>
                            <div class="h-6 bg-slate-700/50 rounded w-1/2"></div>
                        </div>
                        <!-- Main Content -->
                        <div class="col-span-10 p-6">
                            <div class="flex gap-3 mb-6">
                                <div class="h-8 bg-blue-600 rounded w-20"></div>
                                <div class="h-8 bg-slate-200 rounded w-20"></div>
                                <div class="h-8 bg-slate-200 rounded w-20"></div>
                            </div>
                            <div class="grid grid-cols-4 gap-4">
                                <!-- Todo -->
                                <div>
                                    <div class="font-semibold text-slate-600 text-sm mb-3">To Do</div>
                                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-200 mb-2">
                                        <div class="h-4 bg-slate-300 rounded w-3/4 mb-2"></div>
                                        <div class="h-3 bg-slate-200 rounded w-1/2"></div>
                                    </div>
                                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-200">
                                        <div class="h-4 bg-slate-300 rounded w-1/2 mb-2"></div>
                                    </div>
                                </div>
                                <!-- In Progress -->
                                <div>
                                    <div class="font-semibold text-blue-600 text-sm mb-3">In Progress</div>
                                    <div class="bg-blue-50 rounded-lg p-3 border border-blue-200">
                                        <div class="h-4 bg-blue-300 rounded w-2/3 mb-2"></div>
                                        <div class="h-3 bg-blue-200 rounded w-3/4"></div>
                                    </div>
                                </div>
                                <!-- Review -->
                                <div>
                                    <div class="font-semibold text-purple-600 text-sm mb-3">Review</div>
                                    <div class="bg-purple-50 rounded-lg p-3 border border-purple-200 mb-2">
                                        <div class="h-4 bg-purple-300 rounded w-1/2"></div>
                                    </div>
                                </div>
                                <!-- Done -->
                                <div>
                                    <div class="font-semibold text-green-600 text-sm mb-3">Done</div>
                                    <div class="bg-green-50 rounded-lg p-3 border border-green-200">
                                        <div class="h-4 bg-green-300 rounded w-3/4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div id="features" class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2m0-10a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Kanban Boards</h3>
                        <p class="text-slate-600">Visualize your workflow with drag-and-drop boards.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Team Collaboration</h3>
                        <p class="text-slate-600">Work together seamlessly with real-time updates.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Progress Tracking</h3>
                        <p class="text-slate-600">Track velocity and gain insights with analytics.</p>
                    </div>
                </div>

                <!-- Pricing -->
                <div id="pricing" class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                        <h3 class="font-semibold text-slate-900">Starter</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-2">$0</p>
                        <p class="text-sm text-slate-500 mt-1">Free forever</p>
                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            <li>✓ Up to 5 projects</li>
                            <li>✓ 3 team members</li>
                            <li>✓ Unlimited tasks</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg border-2 border-blue-500 p-6 relative">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">Popular</div>
                        <h3 class="font-semibold text-slate-900">Pro</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-2">$12</p>
                        <p class="text-sm text-slate-500 mt-1">per user/month</p>
                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            <li>✓ Unlimited projects</li>
                            <li>✓ Unlimited members</li>
                            <li>✓ Analytics</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                        <h3 class="font-semibold text-slate-900">Enterprise</h3>
                        <p class="text-3xl font-bold text-slate-900 mt-2">Custom</p>
                        <p class="text-sm text-slate-500 mt-1">Contact for pricing</p>
                        <ul class="mt-4 space-y-2 text-sm text-slate-600">
                            <li>✓ Everything in Pro</li>
                            <li>✓ SSO & SAML</li>
                            <li>✓ Priority support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-slate-200">
            <div class="max-w-6xl mx-auto px-4 py-6 flex items-center justify-between">
                <p class="text-sm text-slate-500">&copy; 2024 Startup OS Inc.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Privacy</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Terms</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Support</a>
                </div>
            </div>
        </footer>
    </div>

    <x-toast />
</body>
</html>