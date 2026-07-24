@props([
    'breadcrumbs' => [],
])

<header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white/80 backdrop-blur-xl px-4 lg:px-6 min-w-0">
    <!-- Left: Mobile menu button + Breadcrumbs -->
    <div class="flex items-center gap-4">
        <!-- Sidebar toggle (mobile + desktop) -->
        <button
            x-data
            @click="$dispatch('toggle-sidebar')"
            class="rounded-lg p-1.5 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
            aria-label="Toggle sidebar"
        >
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <!-- Breadcrumbs -->
        @if(!empty($breadcrumbs))
            <x-ui.breadcrumb :items="$breadcrumbs" />
        @endif
    </div>

    <!-- Right: Notifications + Profile -->
    <div class="flex items-center gap-3 min-w-0 shrink">
        <!-- Notifications -->
        <div x-data="{ open: false }" @click.away="open = false" @keydown.escape.window="open = false" class="relative">
            <button
                @click="open = !open"
                class="relative rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
                aria-label="Notifications"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
                <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-blue-600"></span>
            </button>

            <div
                x-show="open"
                x-cloak
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-2 w-80 rounded-xl border border-slate-200 bg-white shadow-card"
                style="display: none;"
            >
                <div class="border-b border-slate-100 px-4 py-3">
                    <h3 class="text-sm font-semibold text-slate-900">Notifications</h3>
                </div>
                <div class="max-h-80 overflow-y-auto">
                    <div class="px-4 py-3 text-center text-sm text-slate-500">
                        No new notifications
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="hidden sm:block h-6 w-px bg-slate-200"></div>

        <!-- Profile dropdown -->
        <div x-data="{ open: false }" @click.away="open = false" @keydown.escape.window="open = false" class="relative">
            <button
                @click="open = !open"
                class="flex items-center gap-2 rounded-lg p-1.5 hover:bg-slate-50"
            >
                <x-ui.avatar :name="Auth::user()->name" size="sm" />
                <span class="hidden text-sm font-medium text-slate-700 sm:block">{{ Auth::user()->name }}</span>
                <svg class="hidden h-4 w-4 text-slate-400 sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                </svg>
            </button>

            <div
                x-show="open"
                x-cloak
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute right-0 mt-2 w-56 rounded-xl border border-slate-200 bg-white py-1 shadow-card"
                style="display: none;"
            >
                <div class="border-b border-slate-100 px-4 py-3">
                    <p class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                    Settings
                </a>
                <div class="my-1 border-t border-slate-100"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                        <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
