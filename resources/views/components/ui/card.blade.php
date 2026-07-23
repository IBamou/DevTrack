@props([
    'padding' => true,
    'hover' => false,
    'bordered' => true,
])

@php
    $classes = 'rounded-xl bg-white';
    if ($bordered) $classes .= ' border border-slate-200';
    if ($hover) $classes .= ' transition-shadow duration-150 hover:shadow-card-hover cursor-pointer';
    if ($padding) $classes .= ' p-5';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
