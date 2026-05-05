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
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <div class="flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white border-b border-slate-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="#" class="flex-shrink-0 flex items-center space-x-2">
                            <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11.917 15.242 6.023 9.478l.083-.083L12 3l5.977 6.395-.083.083-5.894 5.764Z" fill="currentColor"/>
                                <path d="m6.023 15.325 5.894 5.761 5.894-5.761-.083.083-5.811 5.681-5.811-5.681.083-.083Z" fill="currentColor"/>
                            </svg>
                            <span class="text-2xl font-bold text-slate-800">DevTrack</span>
                        </a>
                    </div>
                    <!-- Navigation -->
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-sm font-medium text-slate-600 hover:text-slate-900">Login</a>
                        <a href="#" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Sign Up
                        </a>
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

                    <form class="mt-8 space-y-6" action="#" method="POST">
                        <input type="hidden" name="remember" value="true">
                        <div class="space-y-4 rounded-md shadow-sm">
                            <!-- Full Name -->
                            <div>
                                <label for="full-name" class="block text-sm font-medium text-slate-700">Full Name</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.877 9.877 0 0010 18c2.296 0 4.47-1.07 6.125-2.095a1.23 1.23 0 00.41-1.412A9.87 9.87 0 0010 12.5c-2.295 0-4.47 1.07-6.125 1.993z" />
                                        </svg>
                                    </div>
                                    <input id="full-name" name="full-name" type="text" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="John Doe">
                                </div>
                            </div>

                            <!-- Work Email -->
                            <div>
                                <label for="email-address" class="block text-sm font-medium text-slate-700">Work Email</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                        </svg>
                                    </div>
                                    <input id="email-address" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="name@company.com">
                                </div>
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
                                    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="h-5 w-5 text-slate-400 hover:text-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path d="M10 12.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                                          <path fill-rule="evenodd" d="M.464 10a11.752 11.752 0 012.343-3.645 1.05 1.05 0 011.414-.07L5.59 7.644a9.75 9.75 0 018.82 0l1.37-1.37a1.05 1.05 0 011.414.07 11.752 11.752 0 012.343 3.645 1.05 1.05 0 010 1.31 11.752 11.752 0 01-2.343 3.645 1.05 1.05 0 01-1.414.07L14.41 12.36a9.75 9.75 0 01-8.82 0l-1.37 1.37a1.05 1.05 0 01-1.414-.07A11.752 11.752 0 01.464 11.31a1.05 1.05 0 010-1.31z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="mt-2 text-xs text-slate-500">Minimum 8 characters with 1 special symbol.</p>
                            </div>

                             <!-- Confirm Password -->
                             <div>
                                <label for="confirm-password" class="block text-sm font-medium text-slate-700">Confirm Password</label>
                                <div class="relative mt-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="confirm-password" name="confirm-password" type="password" autocomplete="new-password" required class="block w-full rounded-md border border-slate-300 py-2 pl-10 pr-3 text-sm placeholder:text-slate-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="••••••••">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Create Account
                            </button>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="relative mt-6">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-slate-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-white px-2 text-slate-500">OR SIGN UP WITH</span>
                        </div>
                    </div>

                    <!-- Social Logins -->
                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div>
                            <a href="#" class="inline-flex w-full justify-center rounded-md border border-slate-300 bg-white py-2 px-4 text-sm font-medium text-slate-500 shadow-sm hover:bg-slate-50">
                                <span class="sr-only">Sign in with Google</span>
                                <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/><path d="M1 1h22v22H1z" fill="none"/>
                                </svg>
                                <span class="ml-2">Google</span>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="inline-flex w-full justify-center rounded-md border border-slate-300 bg-white py-2 px-4 text-sm font-medium text-slate-500 shadow-sm hover:bg-slate-50">
                                <span class="sr-only">Sign in with GitHub</span>
                                <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.865 8.165 6.839 9.49.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.269 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.335 1.909-1.295 2.747-1.026 2.747-1.026.546 1.378.203 2.397.1 2.65.64.7 1.029 1.595 1.029 2.688 0 3.848-2.338 4.695-4.566 4.942.359.308.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .267.18.577.688.48C19.135 20.165 22 16.419 22 12c0-5.523-4.477-10-10-10z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-2">GitHub</span>
                            </a>
                        </div>
                    </div>

                    <p class="mt-6 text-center text-xs text-slate-500">
                        By clicking continue, you agree to our
                        <a href="#" class="font-medium text-blue-600 underline hover:text-blue-500">Terms of Service</a>
                        and
                        <a href="#" class="font-medium text-blue-600 underline hover:text-blue-500">Privacy Policy</a>.
                    </p>

                </div>

                <p class="text-center text-sm text-slate-600">
                    Already have an account? <a href="#" class="font-medium text-blue-600 hover:underline">Sign In</a>
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
                        &copy; 2024 Startup OS Inc.
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
