@php
    $user = Auth::user();
@endphp

<aside
    x-data="{
        collapsed: localStorage.getItem('sidebarCollapsed') === 'true',
        mobileOpen: false,
        init() {
            window.addEventListener('toggle-sidebar', () => {
                if (window.innerWidth < 1024) {
                    this.mobileOpen = !this.mobileOpen;
                    document.body.style.overflow = this.mobileOpen ? 'hidden' : '';
                } else {
                    this.collapsed = !this.collapsed;
                    localStorage.setItem('sidebarCollapsed', this.collapsed);
                }
            });
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.mobileOpen) {
                    this.mobileOpen = false;
                    document.body.style.overflow = '';
                }
            });
        }
    }"
    :class="collapsed ? 'w-sidebar-collapsed' : 'w-sidebar'"
    class="hidden lg:flex flex-shrink-0 bg-white border-r border-slate-200 flex-col h-full transition-all duration-300 ease-in-out"
>
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 flex-shrink-0 border-b border-slate-100" :class="collapsed ? 'px-2' : 'px-5'">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5" aria-label="DevTrack Home">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600">
                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                </svg>
            </div>
            <span x-show="!collapsed" x-cloak class="text-lg font-bold text-slate-900 whitespace-nowrap">DevTrack</span>
        </a>
    </div>

    <!-- Main Navigation -->
    <nav class="flex-1 py-4 space-y-1.5 overflow-y-auto" :class="collapsed ? 'px-2' : 'px-3'">
        @php
            $isDashboard = request()->routeIs('dashboard');
            $isProjects = request()->routeIs('projects.index') || request()->routeIs('projects.show') || request()->routeIs('projects.edit');
            $isArchives = request()->routeIs('projects.archives');
        @endphp

        <a
            href="{{ route('dashboard') }}"
            @class([
                'flex items-center rounded-lg text-[13.5px] font-medium transition-colors duration-150',
                'bg-blue-50 text-blue-700' => $isDashboard,
                'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !$isDashboard,
            ])
            x-bind:class="collapsed ? 'justify-center p-2.5' : 'gap-3 px-4 py-2.5'"
            aria-label="Overview"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
            <span x-show="!collapsed" x-cloak class="whitespace-nowrap">Overview</span>
        </a>

        <a
            href="{{ route('projects.index') }}"
            @class([
                'flex items-center rounded-lg text-[13.5px] font-medium transition-colors duration-150',
                'bg-blue-50 text-blue-700' => $isProjects,
                'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !$isProjects,
            ])
            x-bind:class="collapsed ? 'justify-center p-2.5' : 'gap-3 px-4 py-2.5'"
            aria-label="Projects"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
            <span x-show="!collapsed" x-cloak class="whitespace-nowrap">Projects</span>
        </a>

        <!-- Divider -->
        <div class="py-3">
            <div class="border-t border-slate-100"></div>
        </div>

        <!-- Workspace Section -->
        <div x-show="!collapsed" x-cloak>
            <p class="px-3 mb-2 text-2xs font-semibold uppercase tracking-wider text-slate-400">Workspace</p>
        </div>

        <a
            href="{{ route('projects.archives') }}"
            @class([
                'flex items-center rounded-lg text-[13.5px] font-medium transition-colors duration-150',
                'bg-blue-50 text-blue-700' => $isArchives,
                'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !$isArchives,
            ])
            x-bind:class="collapsed ? 'justify-center p-2.5' : 'gap-3 px-4 py-2.5'"
            aria-label="Archives"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
            <span x-show="!collapsed" x-cloak class="whitespace-nowrap">Archives</span>
        </a>

    </nav>

    <!-- New Project Button -->
    <div class="flex-shrink-0 px-3 pb-3">
        <a
            href="{{ route('projects.create') }}"
            class="flex items-center justify-center rounded-lg bg-blue-600 text-white transition-colors hover:bg-blue-700"
            :class="collapsed ? 'h-10 w-10' : 'gap-2 px-4 py-2.5'"
            aria-label="New Project"
        >
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span x-show="!collapsed" x-cloak class="text-sm font-medium whitespace-nowrap">New Project</span>
        </a>
    </div>

    <!-- User Section -->
    <div class="flex-shrink-0 border-t border-slate-100 p-3">
        <div
            x-data="{ open: false }"
            @click.away="open = false"
            @keydown.escape.window="open = false"
            class="relative"
        >
            <button
                @click="open = !open"
                class="flex w-full items-center gap-3 rounded-lg p-2 text-left transition-colors hover:bg-slate-50"
                :class="collapsed ? 'justify-center' : ''"
                aria-label="User menu for {{ $user->name }}"
            >
                <x-ui.avatar :name="$user->name" size="sm" />
                <div x-show="!collapsed" x-cloak class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-900 truncate">{{ $user->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ $user->email }}</p>
                </div>
                <svg x-show="!collapsed" x-cloak class="h-4 w-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                class="absolute bottom-full left-0 right-0 mb-2 rounded-xl border border-slate-200 bg-white py-1 shadow-card"
                style="display: none;"
            >
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                    Settings
                </a>
                <div class="my-1 border-t border-slate-100"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2 px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
                        <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile Sidebar -->
<div
    x-data="{ show: false }"
    x-on:toggle-sidebar.window="if (window.innerWidth < 1024) { show = !show; document.body.style.overflow = show ? 'hidden' : ''; }"
    x-on:keydown.escape.window="if (show) { show = false; document.body.style.overflow = ''; }"
    x-show="show"
    x-cloak
    class="fixed inset-0 z-50 lg:hidden"
>
    <div
        x-show="show"
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm"
        x-on:click="show = false; document.body.style.overflow = ''"
    ></div>

    <div
        x-show="show"
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-150"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="absolute top-0 left-0 bottom-0 w-sidebar bg-white shadow-xl flex flex-col"
    >
        <!-- Mobile Logo -->
        <div class="flex items-center justify-between h-16 border-b border-slate-100 px-5">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5" aria-label="DevTrack Home">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                    </svg>
                </div>
                <span class="text-lg font-bold text-slate-900">DevTrack</span>
            </a>
            <button
                x-on:click="show = false; document.body.style.overflow = ''"
                class="rounded-lg p-1 text-slate-400 hover:text-slate-500 hover:bg-slate-100"
                aria-label="Close sidebar"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="flex-1 py-4 space-y-1.5 overflow-y-auto px-3">
            <x-ui.nav-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                <span class="whitespace-nowrap">Overview</span>
            </x-ui.nav-item>

            <x-ui.nav-item href="{{ route('projects.index') }}" :active="request()->routeIs('projects.index') || request()->routeIs('projects.show') || request()->routeIs('projects.edit')">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                <span class="whitespace-nowrap">Projects</span>
            </x-ui.nav-item>

            <div class="py-3">
                <div class="border-t border-slate-100"></div>
            </div>

            <p class="px-3 mb-2 text-2xs font-semibold uppercase tracking-wider text-slate-400">Workspace</p>

            <x-ui.nav-item href="{{ route('projects.archives') }}" :active="request()->routeIs('projects.archives')">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                <span class="whitespace-nowrap">Archives</span>
            </x-ui.nav-item>
        </nav>

        <!-- Mobile New Project -->
        <div class="flex-shrink-0 px-4 pb-3">
            <a href="{{ route('projects.create') }}" class="flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-blue-700">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span class="whitespace-nowrap">New Project</span>
            </a>
        </div>

        <!-- Mobile User Section -->
        <div class="flex-shrink-0 border-t border-slate-100 p-3">
            <div class="flex items-center gap-3 rounded-lg p-2">
                <x-ui.avatar :name="$user->name" size="sm" />
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-900 truncate">{{ $user->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
