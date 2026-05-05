<!-- Sidebar -->
<div
    class="w-64 bg-gradient-to-b from-slate-900 to-slate-800 text-white shadow-xl h-screen flex flex-col fixed left-0 top-0">
    <!-- Logo Section -->
    <div class="p-6 border-b border-slate-700">
        <a href="{{ route('dashboard') }}"
            class="flex items-center space-x-2 text-2xl font-bold hover:text-slate-300 transition-colors">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" />
                <path fill-rule="evenodd"
                    d="M3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zm8 0a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    clip-rule="evenodd" />
            </svg>
            <span>DevTrack</span>
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
        <a href="{{ route('dashboard') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-600' : 'hover:bg-slate-700' }} transition-colors">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4V3" />
            </svg>
            <span class="text-sm font-medium">Tableau de bord</span>
        </a>

        <a href="{{ route('projects.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('projects.index') || request()->routeIs('projects.show') ? 'bg-blue-600' : 'hover:bg-slate-700' }} transition-colors">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm font-medium">Projets</span>
        </a>

        <a href="{{ route('projects.archives') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('projects.archives') ? 'bg-blue-600' : 'hover:bg-slate-700' }} transition-colors">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9-4v4m0 0H8m4 0h4" />
            </svg>
            <span class="text-sm font-medium">Archives</span>
        </a>
    </nav>

    <!-- User Profile Section (Bottom) -->
    <div class="border-t border-slate-700 p-4">
        <button
            class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-slate-700 transition-colors text-left">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
            </div>
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>
</div>