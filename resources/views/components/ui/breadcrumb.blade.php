@props([
    'items' => [],
])

<nav class="flex items-center space-x-1 text-sm text-slate-500">
    @foreach($items as $index => $item)
        @if($index > 0)
            <svg class="h-4 w-4 flex-shrink-0 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        @endif

        @if(isset($item['href']) && $index < count($items) - 1)
            <a href="{{ $item['href'] }}" class="hover:text-slate-700 transition-colors">
                {{ $item['label'] }}
            </a>
        @else
            <span class="{{ $index === count($items) - 1 ? 'text-slate-900 font-medium' : '' }}">
                {{ $item['label'] }}
            </span>
        @endif
    @endforeach
</nav>
