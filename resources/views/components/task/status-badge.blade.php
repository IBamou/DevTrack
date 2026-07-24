@props([
    'status',
    'size' => 'base',
])

@php
    $config = match($status) {
        'todo' => [
            'class' => 'bg-slate-50 text-slate-700 ring-slate-600/10',
            'label' => 'Todo',
            'dot' => 'bg-slate-400',
        ],
        'in_progress' => [
            'class' => 'bg-blue-50 text-blue-700 ring-blue-600/10',
            'label' => 'In Progress',
            'dot' => 'bg-blue-500',
        ],
        'review' => [
            'class' => 'bg-violet-50 text-violet-700 ring-violet-600/10',
            'label' => 'Review',
            'dot' => 'bg-violet-500',
        ],
        'done' => [
            'class' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/10',
            'label' => 'Done',
            'dot' => 'bg-emerald-500',
        ],
        default => [
            'class' => 'bg-slate-100 text-slate-600 ring-slate-500/10',
            'label' => ucfirst($status ?? 'unknown'),
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
