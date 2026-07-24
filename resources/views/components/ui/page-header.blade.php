@props([
    'title',
    'description' => null,
])

<div class="mb-6">
    <h1 class="text-2xl font-semibold tracking-tight text-slate-900">{{ $title }}</h1>
    @if($description)
        <p class="mt-1 text-sm text-slate-500">{{ $description }}</p>
    @endif
</div>
