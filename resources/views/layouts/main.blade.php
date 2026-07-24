<!DOCTYPE html>
<html lang="en" style="font-size: 13px;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DevTrack - Streamline your project workflow with Kanban boards, task management, and team collaboration.">
    <title>@yield('title', 'DevTrack')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { scrollbar-width: thin; scrollbar-color: #CBD5E1 transparent; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94A3B8; }
    </style>
</head>

<body class="bg-slate-50 font-sans text-slate-900 antialiased">
    <div class="flex h-screen overflow-clip">
        <x-sidebar />

        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <x-navbar :breadcrumbs="$breadcrumbs ?? []" />

            <main class="flex-1 overflow-y-auto p-4 lg:p-6">
                <div class="min-h-full mx-auto @yield('container-class', 'max-w-7xl')">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @yield('scripts')

    <x-toast />
</body>

</html>
