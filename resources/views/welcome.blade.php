<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTrack - The All-In-One Platform for Software Teams</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-sans text-slate-800 antialiased">

    <div class="relative overflow-hidden">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center space-x-2">
                            <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11.917 15.242 6.023 9.478l.083-.083L12 3l5.977 6.395-.083.083-5.894 5.764Z" fill="currentColor"/>
                                <path d="m6.023 15.325 5.894 5.761 5.894-5.761-.083.083-5.811 5.681-5.811-5.681.083-.083Z" fill="currentColor"/>
                            </svg>
                            <span class="text-2xl font-bold text-slate-800">DevTrack</span>
                        </a>
                    </div>
                    <!-- Navigation -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-medium text-slate-600 hover:text-slate-900">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Login</a>
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Sign Up
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <main>
            <div class="relative pt-16 sm:pt-24 lg:pt-32">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl md:text-6xl">
                            <span class="block">Streamline Your Software</span>
                            <span class="block text-blue-600">Development Workflow</span>
                        </h1>
                        <p class="mt-3 mx-auto max-w-md text-lg text-slate-600 sm:text-xl md:mt-5 md:max-w-3xl">
                            DevTrack is the all-in-one platform for modern software teams. Plan, track, and ship great products with less friction and more focus.
                        </p>
                        <div class="mt-8 flex justify-center gap-3">
                            @auth
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700">Go to Dashboard</a>
                            @else
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700">Get Started Free</a>
                                <a href="#" class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-6 py-3 text-base font-medium text-slate-700 shadow-sm hover:bg-slate-50">Request a Demo</a>
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="relative mt-12 sm:mt-16 lg:mt-24">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="relative rounded-xl shadow-2xl overflow-hidden bg-slate-800 border border-slate-700">
                           <img class="w-full" src="https://placehold.co/1200x600/1e293b/3b82f6?text=DevTrack+Dashboard" alt="DevTrack App Screenshot">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Trusted By Section -->
    <div class="bg-slate-50 py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-semibold uppercase text-slate-500 tracking-wider">Trusted by the world's most innovative teams</p>
            <div class="mt-8 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1"><span class="text-2xl font-bold text-slate-400">ACME</span></div>
                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1"><span class="text-2xl font-bold text-slate-400">TechCorp</span></div>
                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1"><span class="text-2xl font-bold text-slate-400">StartupX</span></div>
                <div class="col-span-1 flex justify-center md:col-span-3 lg:col-span-1"><span class="text-2xl font-bold text-slate-400">DevCo</span></div>
                <div class="col-span-2 flex justify-center md:col-span-3 lg:col-span-1"><span class="text-2xl font-bold text-slate-400">BuildLab</span></div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 uppercase tracking-wide">Everything you need</h2>
                <p class="mt-2 text-3xl font-extrabold text-slate-900 tracking-tight sm:text-4xl">All-in-one development platform</p>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-500">Stop juggling tools. DevTrack brings your team's entire workflow into one collaborative space.</p>
            </div>
            <div class="mt-12 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
                <div class="pt-6">
                    <div class="flow-root bg-slate-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div><span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg"><svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></span></div>
                            <h3 class="mt-8 text-lg font-medium text-slate-900 tracking-tight">Visual Kanban Boards</h3>
                            <p class="mt-5 text-base text-slate-500">Easily visualize your workflow from start to finish. Drag-and-drop tasks, set priorities, and keep everyone on the same page.</p>
                        </div>
                    </div>
                </div>
                <div class="pt-6">
                    <div class="flow-root bg-slate-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div><span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg"><svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></span></div>
                            <h3 class="mt-8 text-lg font-medium text-slate-900 tracking-tight">Seamless Collaboration</h3>
                            <p class="mt-5 text-base text-slate-500">Mention teammates, share files, and keep all task-related conversations in one place. Say goodbye to scattered information.</p>
                        </div>
                    </div>
                </div>
                <div class="pt-6">
                    <div class="flow-root bg-slate-50 rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div><span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg"><svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg></span></div>
                            <h3 class="mt-8 text-lg font-medium text-slate-900 tracking-tight">Insightful Analytics</h3>
                            <p class="mt-5 text-base text-slate-500">Track team velocity, identify bottlenecks, and make data-driven decisions with built-in reporting and project dashboards.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Section -->
    <section class="bg-slate-50 py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <img class="mx-auto h-12 w-12 rounded-full" src="https://ui-avatars.com/api/?name=Alex+Rivera&background=3b82f6&color=fff" alt="Testimonial author">
                <blockquote class="mt-6 max-w-3xl mx-auto">
                    <p class="text-xl font-medium text-slate-900">"DevTrack has revolutionized our workflow. We're shipping features 30% faster and our team has never been more aligned. It's the command center for our entire engineering department."</p>
                </blockquote>
                <footer class="mt-6">
                    <div class="text-base font-medium text-slate-900">Alex Rivera</div>
                    <div class="text-base text-slate-600">Head of Engineering, Startup OS Inc.</div>
                </footer>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Ready to supercharge your team?</h2>
                <p class="mt-4 text-lg text-slate-500">Start building better software today. No credit card required.</p>
                @auth
                <a href="{{ route('dashboard') }}" class="mt-8 inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700">Go to Dashboard</a>
                @else
                <a href="{{ route('register') }}" class="mt-8 inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700">Create your free account</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row items-center justify-between">
                 <p class="text-sm text-slate-500 order-2 sm:order-1 mt-4 sm:mt-0">
                    &copy; 2024 Startup OS Inc. All rights reserved.
                </p>
                <div class="flex items-center space-x-6 order-1 sm:order-2">
                    <a href="{{ route('register') }}" class="text-sm text-slate-500 hover:text-slate-700">Privacy</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Terms</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Support</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">API Docs</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
