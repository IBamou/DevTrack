@props([
    'lines' => 3,
    'class' => '',
])

<div class="animate-pulse space-y-3 {{ $class }}">
    @for($i = 0; $i < $lines; $i++)
        <div
            class="rounded-lg bg-slate-200"
            style="height: {{ $i === 0 ? '20px' : '14px' }}; width: {{ rand(50, 100) }}%"
        ></div>
    @endfor
</div>
