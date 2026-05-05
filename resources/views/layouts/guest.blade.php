<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevTrack') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Background Decorative Elements -->
        <div
            class="absolute top-0 left-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>
        <div
            class="absolute bottom-0 right-0 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20">
        </div>

        <!-- Main Content -->
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden relative z-10">
            {{ $slot }}
        </div>
    </div>
</body>

</html>