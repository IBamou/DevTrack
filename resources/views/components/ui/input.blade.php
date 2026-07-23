@props([
    'label' => null,
    'error' => null,
    'hint' => null,
])

<div class="space-y-1.5">
    @if($label)
        <label {{ $attributes->only('for') }} class="block text-sm font-medium text-slate-700">
            {{ $label }}
        </label>
    @endif

    <input {{ $attributes->merge(['class' => 'block w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-900 placeholder-slate-400 transition-colors duration-150 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500']) }}>

    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @elseif($hint)
        <p class="text-sm text-slate-500">{{ $hint }}</p>
    @endif
</div>
