@props([
    'label' => null,
    'error' => null,
    'options' => [],
    'placeholder' => 'Select an option',
])

<div class="space-y-1.5">
    @if($label)
        <label {{ $attributes->only('for') }} class="block text-sm font-medium text-slate-700">
            {{ $label }}
        </label>
    @endif

    <select {{ $attributes->merge(['class' => 'block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 transition-colors duration-150 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500']) }}>
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
        {{ $slot }}
    </select>

    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
