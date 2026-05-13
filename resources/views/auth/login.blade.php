<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - DevTrack</title>
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
<body class="bg-slate-50 font-sans text-slate-900">

    <div class="flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white border-b border-slate-200">
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
                        @if(Route::has('login'))
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">Login</a>
                        @endif
                        @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Sign Up
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
            <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden md:grid md:grid-cols-2">

                <!-- Left Side: Sign In Form -->
                <div class="p-8 md:p-12">
                    <div class="w-full">
                        <h2 class="text-2xl font-bold text-slate-900">Sign In</h2>
                        <p class="mt-2 text-sm text-slate-600">Enter your credentials to access your workspace</p>

                        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                            @csrf
                            <!-- Email Input -->
                            <div>
                                <label for="email" class="text-sm font-medium text-slate-700">Email Address</label>
                                <div class="relative mt-2">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="name@startup.com" class="block w-full rounded-md border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </div>
                                @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="password" class="text-sm font-medium text-slate-700">Password</label>
                                    @if(Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
                                    @endif
                                </div>
                                <div class="relative mt-2">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="password" name="password" type="password" placeholder="••••••••" class="block w-full rounded-md border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </div>
                                @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="flex items-center">
                                <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <label for="remember-me" class="ml-2 block text-sm text-slate-700">Remember me</label>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="w-full justify-center rounded-md bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Sign In</button>
                            </div>
                        </form>

                        <p class="mt-8 text-center text-sm text-slate-600">
                            Don't have an account? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:underline">Sign up now</a>
                        </p>
                </div>

                <!-- Right Side: Promo -->
                <div class="hidden md:flex flex-col items-start justify-center bg-slate-50/75 p-8 md:p-12">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100">
                        <svg class="h-7 w-7 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </div>

                    <h3 class="mt-6 text-xl font-bold">New to DevTrack?</h3>
                    <p class="mt-2 text-sm text-slate-600">
                        Experience the simplest way to manage your startup's development lifecycle. Join thousands of teams shipping faster.
                    </p>

                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                            <svg class="h-6 w-6 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3 text-sm text-slate-700">Manage projects with Kanban precision</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-6 w-6 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3 text-sm text-slate-700">Track developer velocity and tasks</span>
                        </li>
                         <li class="flex items-start">
                            <svg class="h-6 w-6 flex-shrink-0 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3 text-sm text-slate-700">Lightweight and optimized for startups</span>
                        </li>
                    </ul>

                    <a href="{{ route('register') }}" class="mt-8 inline-flex items-center justify-center w-full rounded-md border border-slate-300 bg-white py-2 px-4 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50">
                        Create an Account
                        <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <p class="text-sm text-slate-500">
                        DevTrack &copy; {{ date('Y') }} Startup OS Inc.
                    </p>
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Privacy</a>
                        <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Terms</a>
                        <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Support</a>
                        <a href="#" class="text-sm text-slate-500 hover:text-slate-700">API Docs</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>

</body>
</html>
