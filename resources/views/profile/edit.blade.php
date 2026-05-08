@extends('layouts.main')

@section('title', 'Profile - DevTrack')

@section('content')
<div class="p-6 lg:p-8">
    <h1 class="text-3xl font-bold mb-6">Profile Settings</h1>

    <div class="space-y-6">
        <!-- Update Profile Information -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Profile Information</h2>
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Update Password</h2>
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-lg font-semibold mb-4">Delete Account</h2>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection