@props([
    'href' => null,
    'active' => false,
    'disabled' => false,
    'badge' => null,
])

@if($disabled)
    <span {{ $attributes->merge(['class' => 'flex items-center gap-3 rounded-lg px-4 py-2.5 text-[13.5px] font-medium text-slate-400 cursor-not-allowed']) }}>
        {{ $slot }}
    </span>
@else
    @php
        $classes = $active
            ? 'flex items-center gap-3 rounded-lg px-4 py-2.5 text-[13.5px] font-medium bg-blue-50 text-blue-700'
            : 'flex items-center gap-3 rounded-lg px-4 py-2.5 text-[13.5px] font-medium text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors duration-150';
    @endphp

    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}

        @if($badge)
            <span class="ml-auto inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-2xs font-medium text-slate-600">
                {{ $badge }}
            </span>
        @endif
    </a>
@endif
