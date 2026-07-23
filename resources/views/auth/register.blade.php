<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account - DevTrack</title>
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        html { font-size: 80%; }
        body { min-height: 100vh; }
        .h-screen { min-height: 100vh; height: auto; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-800">

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
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex flex-col items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
            <div class="w-full max-w-md space-y-8">
                <!-- Form Card -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-slate-900">Create an account</h2>
                        <p class="mt-2 text-sm text-slate-600">Enter your details below to join your team</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
                        @csrf
                        <input type="hidden" name="remember" value="">{{-- removed orphaned remember me --}}
                        <div class="space-y-4 rounded-md shadow-sm">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.877 9.877 0 0010 18c2.296 0 4.47-1.07 6.125-2.095a1.23 1.23 0 00.41-1.412A9.87 9.87 0 0010 12.5c-2.295 0-4.47 1.07-6.125 1.993z" />
                                        </svg>
                                    </div>
                                    <input id="name" name="name" type="text" value="{{ old('name') }}" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="John Doe">
                                </div>
                                @error('name')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                        </svg>
                                    </div>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="name@company.com">
                                </div>
                                @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-10 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="••••••••">
                                </div>
                                @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                             <!-- Confirm Password -->
                             <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm Password</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="••••••••">
                                </div>
                                @error('password_confirmation')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Terms -->
                        <div class="flex items-start">
                            <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 mt-0.5">
                            <label for="terms" class="ml-2 block text-sm text-slate-600">
                                I agree to the <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>
                            </label>
                        </div>

                        <div>
                            <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Create Account
                            </button>
                        </div>
                    </form>

                    <p class="mt-6 text-center text-xs text-slate-500">
                        By clicking continue, you agree to our
                        <a href="#" class="font-medium text-blue-600 underline hover:text-blue-500">Terms of Service</a>
                        and
                        <a href="#" class="font-medium text-blue-600 underline hover:text-blue-500">Privacy Policy</a>.
                    </p>

                </div>

                <p class="text-center text-sm text-slate-600">
                    Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Sign In</a>
                </p>

            </div>

             <div class="mt-8 text-center text-sm text-slate-500 max-w-md">
                <p>Trusted by 500+ startups to manage engineering workflows. DevTrack ensures your team stays synchronized, productive, and focused on building great products.</p>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <p class="text-sm text-slate-500">
                        &copy; {{ date('Y') }} Startup OS Inc.
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

    <x-toast />
</body>
</html>
