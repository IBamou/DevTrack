@props([
    'name',
    'position' => 'right',
    'maxWidth' => 'md',
    'title' => null,
])

@php
    $maxWidths = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-drawer',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
    ];
    $width = $maxWidths[$maxWidth] ?? $maxWidths['md'];

    $positionClasses = $position === 'left'
        ? 'left-0 sm:left-0 right-auto'
        : 'right-0 sm:right-0 left-auto';
@endphp

<div
    x-data="{
        show: false,
        init() {
            window.addEventListener('open-drawer', (e) => {
                if (e.detail === '{{ $name }}') {
                    this.show = true;
                    document.body.style.overflow = 'hidden';
                }
            });
            window.addEventListener('close-drawer', (e) => {
                if (e.detail === '{{ $name }}') {
                    this.show = false;
                    document.body.style.overflow = '';
                }
            });
            window.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.show) {
                    this.show = false;
                    document.body.style.overflow = '';
                }
            });
        }
    }"
    x-show="show"
    x-cloak
    class="fixed inset-0 z-50"
    aria-modal="true"
    role="dialog"
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
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-150"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="{{ $positionClasses }} absolute top-0 bottom-0 {{ $width }} w-full bg-white shadow-drawer flex flex-col"
    >
        @if($title)
            <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4 flex-shrink-0">
                <h3 class="text-lg font-semibold text-slate-900">{{ $title }}</h3>
                <button
                    x-on:click="show = false; document.body.style.overflow = ''"
                    class="rounded-lg p-1 text-slate-400 hover:text-slate-500 hover:bg-slate-100"
                >
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="flex-1 overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>
