@extends('layouts.app') 

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Profile Heading --}}
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile') }}
            </h2>

            {{-- Update Profile Information Form --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @includeIf('profile.partials.update-profile-information-form', ['user' => auth()->user()])
                </div>
            </div>

            {{-- Update Password Form --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @includeIf('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete User Form --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @includeIf('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection