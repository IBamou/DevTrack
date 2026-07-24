<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevTrack') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        html { font-size: 80%; }
        body { min-height: 100vh; }
        .h-screen { min-height: 100vh; height: auto; }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50" x-data="{ sidebarCollapsed: false }">
    <div class="min-h-screen flex">
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col">
            @include('layouts.topbar')

            <main class="flex-1 overflow-auto bg-gray-50">
                <div class="max-w-7xl mx-auto px-6 py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <x-toast />
</body>

</html>
