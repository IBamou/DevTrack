<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DevTrack')</title>

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
        body { min-height: 100vh; margin: 0; }
        .h-screen { min-height: 100vh; height: auto; }
        .avatar-group > * { border: 2px solid white; }
    </style>
</head>

<body class="bg-slate-100 font-sans text-slate-900 antialiased">
    <div class="flex h-screen bg-slate-100">
        <x-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-navbar />

            <main class="flex-1 overflow-y-auto">
                <div class="min-h-full">
                    @yield('content')
                </div>
            </main>

            <footer class="py-4 border-t border-slate-200 flex items-center justify-between px-6">
                <p class="text-sm text-slate-500">
                    <strong>DevTrack</strong> &copy; 2024 Startup OS Inc.
                </p>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Privacy</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Terms</a>
                    <a href="#" class="text-sm text-slate-500 hover:text-slate-700">Support</a>
                </div>
            </footer>
        </div>
    </div>

    @yield('scripts')
</body>

</html>