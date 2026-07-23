@props([
    'name',
    'title' => 'Confirm Action',
    'message' => 'Are you sure you want to proceed?',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel',
    'variant' => 'danger',
])

@php
    $confirmClasses = match($variant) {
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        default => 'bg-slate-600 text-white hover:bg-slate-700 focus:ring-slate-500',
    };
@endphp

<x-ui.modal :name="$name" :title="$title" maxWidth="sm">
    <div class="p-6">
        <p class="text-sm text-slate-600">{{ $message }}</p>

        <div class="mt-6 flex items-center justify-end gap-3">
            <button
                type="button"
                x-on:click="$dispatch('close-modal', '{{ $name }}')"
                class="inline-flex items-center justify-center rounded-lg px-3.5 py-2 text-sm font-medium text-slate-700 border border-slate-200 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
            >
                {{ $cancelText }}
            </button>

            <form x-data x-on:submit="$dispatch('confirm-action')" class="inline">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg px-3.5 py-2 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 {{ $confirmClasses }}"
                >
                    {{ $confirmText }}
                </button>
            </form>
        </div>
    </div>
</x-ui.modal>
