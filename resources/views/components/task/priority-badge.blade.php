@props([
    'priority',
    'size' => 'base',
])

@php
    $config = match($priority) {
        'high' => [
            'class' => 'bg-red-50 text-red-700 ring-red-600/10',
            'label' => 'High',
            'dot' => 'bg-red-500',
        ],
        'medium' => [
            'class' => 'bg-amber-50 text-amber-700 ring-amber-600/10',
            'label' => 'Medium',
            'dot' => 'bg-amber-500',
        ],
        'low' => [
            'class' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/10',
            'label' => 'Low',
            'dot' => 'bg-emerald-500',
        ],
        default => [
            'class' => 'bg-slate-100 text-slate-600 ring-slate-500/10',
            'label' => ucfirst($priority ?? 'none'),
            'dot' => 'bg-slate-400',
        ],
    };

    $sizeClasses = match($size) {
        'sm' => 'px-1.5 py-0.5 text-2xs',
        'base' => 'px-2 py-0.5 text-xs',
        'lg' => 'px-2.5 py-1 text-sm',
        default => 'px-2 py-0.5 text-xs',
    };
@endphp

<span class="inline-flex items-center gap-1.5 rounded-full font-medium ring-1 ring-inset {{ $config['class'] }} {{ $sizeClasses }}">
    <span class="h-1.5 w-1.5 rounded-full {{ $config['dot'] }}"></span>
    {{ $config['label'] }}
</span>
