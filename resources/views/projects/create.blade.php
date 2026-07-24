@extends('layouts.main')

@section('title', 'Create Project - DevTrack')

@section('content')
<div class="mx-auto max-w-2xl">
    <!-- Header -->
    <div class="mb-8">
        <x-ui.breadcrumb :items="[
            ['label' => 'Projects', 'href' => route('projects.index')],
            ['label' => 'Create New'],
        ]" />
        <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-900">Create a new project</h1>
        <p class="mt-1 text-sm text-slate-500">Set up your team's workspace and start tracking progress.</p>
    </div>

    <!-- Form -->
    <div class="card">
        <form method="POST" action="{{ route('projects.store') }}" class="p-6 space-y-6">
            @csrf

            <div x-data="{ prefix: '{{ old('prefix') }}' }">
                <x-ui.input
                    name="title"
                    label="Project name"
                    value="{{ old('title') }}"
                    placeholder="e.g. Website Redesign"
                    required
                    autofocus
                />
                @error('title')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="mt-5">
                    <x-ui.input
                        name="prefix"
                        label="Project prefix"
                        value="{{ old('prefix') }}"
                        placeholder="e.g. WEB"
                        maxlength="10"
                        required
                        x-model="prefix"
                    />
                    @error('prefix')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1.5 text-xs text-slate-500">
                        Tasks will be numbered <span class="font-medium text-slate-700" x-text="prefix ? prefix + '-1' : 'PREFIX-1'"></span>
                    </p>
                </div>
            </div>

            <div>
                <x-ui.textarea
                    name="description"
                    label="Description"
                    placeholder="Describe your project goals and objectives"
                    rows="4"
                >{{ old('description') }}</x-ui.textarea>
                @error('description')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <x-ui.input
                    name="due_date"
                    type="date"
                    label="Due date"
                    value="{{ old('due_date') }}"
                />
                @error('due_date')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <a href="{{ route('projects.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900">
                    Cancel
                </a>
                <x-ui.button type="submit" variant="primary">
                    Create Project
                </x-ui.button>
            </div>
        </form>
    </div>

    <!-- Tips -->
    <div class="mt-6 rounded-lg border border-slate-200 bg-slate-50 p-4">
        <div class="flex items-start gap-3">
            <svg class="h-5 w-5 text-slate-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
            </svg>
            <div>
                <h3 class="text-sm font-medium text-slate-700">Tips for a great project</h3>
                <ul class="mt-2 space-y-1 text-xs text-slate-500">
                    <li>Keep the project name short and memorable.</li>
                    <li>Use the description to define what success looks like.</li>
                    <li>Set a realistic deadline to help the team prioritize.</li>
                    <li>You can invite team members after creating the project.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
