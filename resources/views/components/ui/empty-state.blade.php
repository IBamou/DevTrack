@props([
    'title' => 'No items found',
    'description' => null,
    'icon' => null,
    'action' => null,
    'actionLabel' => 'Create',
])

<div class="flex flex-col items-center justify-center py-12 px-4 text-center">
    @if($icon)
        <div class="mb-4 rounded-full bg-slate-100 p-4">
            {!! $icon !!}
        </div>
    @else
        <div class="mb-4 rounded-full bg-slate-100 p-4">
            <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
    @endif

    <h3 class="text-sm font-semibold text-slate-900">{{ $title }}</h3>

    @if($description)
        <p class="mt-1 text-sm text-slate-500">{{ $description }}</p>
    @endif

    @if($action)
        <div class="mt-4">
            {{ $action }}
        </div>
    @endif

    {{ $slot }}
</div>
