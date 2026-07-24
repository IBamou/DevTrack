@props([
    'align' => 'bottom-end',
    'width' => '48',
])

@php
    $alignmentClasses = match($align) {
        'top-left' => 'left-0 origin-top-left',
        'top-right' => 'right-0 origin-top-right',
        'bottom-left' => 'left-0 origin-bottom-left',
        'bottom-right' => 'right-0 origin-bottom-right',
        default => 'right-0 origin-top-right',
    };

    $widthClass = match($width) {
        '48' => 'w-48',
        '56' => 'w-56',
        '64' => 'w-64',
        default => 'w-48',
    };
@endphp

<div
    x-data="{ open: false }"
    @click.away="open = false"
    @keydown.escape.window="open = false"
    class="relative inline-block text-left"
    {{ $attributes }}
>
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $widthClass }} {{ $alignmentClasses }} rounded-xl border border-slate-200 bg-white py-1 shadow-card"
        style="display: none;"
        @click="open = false"
    >
        {{ $content }}
    </div>
</div>
