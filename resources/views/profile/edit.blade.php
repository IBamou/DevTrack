@extends('layouts.main')

@section('title', 'Profile - DevTrack')

@section('content-wrapper-class', '')

@section('content')
<div class="space-y-3">
    <div class="mb-3">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Profile Settings</h1>
        <p class="mt-1 text-sm text-slate-500">Manage your account information and security settings.</p>
    </div>

    <!-- Update Profile Information -->
    <x-ui.card>
        <h2 class="text-base font-semibold text-slate-900 mb-3">Profile Information</h2>
        @include('profile.partials.update-profile-information-form')
    </x-ui.card>

    <!-- Update Password -->
    <x-ui.card>
        <h2 class="text-base font-semibold text-slate-900 mb-3">Update Password</h2>
        @include('profile.partials.update-password-form')
    </x-ui.card>

    <!-- Delete Account -->
    <x-ui.card class="border-red-200">
        <h2 class="text-base font-semibold text-red-600">Danger Zone</h2>
        <p class="text-sm text-slate-500 mb-3">Permanently delete your account and all of its resources.</p>
        @include('profile.partials.delete-user-form')
    </x-ui.card>
</div>
@endsection
