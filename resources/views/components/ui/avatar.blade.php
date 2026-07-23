@props([
    'name' => null,
    'initials' => null,
    'size' => 'base',
    'src' => null,
])

@php
    $sizes = [
        'xs' => 'w-6 h-6 text-2xs',
        'sm' => 'w-8 h-8 text-xs',
        'base' => 'w-9 h-9 text-sm',
        'lg' => 'w-10 h-10 text-sm',
        'xl' => 'w-12 h-12 text-base',
    ];

    $sizeClass = $sizes[$size] ?? $sizes['base'];

    if (!$initials && $name) {
        $parts = explode(' ', $name);
        $initials = strtoupper(substr($parts[0], 0, 1));
        if (count($parts) > 1) {
            $initials .= strtoupper(substr($parts[1], 0, 1));
        }
    }

    $colors = [
        'bg-blue-100 text-blue-700',
        'bg-emerald-100 text-emerald-700',
        'bg-amber-100 text-amber-700',
        'bg-purple-100 text-purple-700',
        'bg-rose-100 text-rose-700',
        'bg-cyan-100 text-cyan-700',
    ];
    $colorIndex = $name ? crc32($name) % count($colors) : 0;
@endphp

<div {{ $attributes->merge(['class' => "relative inline-flex items-center justify-center rounded-full font-medium {$sizeClass} {$colors[$colorIndex]}"]) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $name }}" class="rounded-full object-cover {{ $sizeClass }}">
    @else
        {{ $initials ?? '?' }}
    @endif
</div>
