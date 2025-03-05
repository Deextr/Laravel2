@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Contact</h1>
            <form method="POST" action="{{ route('contacts.update', $contact) }}" 
                  hx-patch="{{ route('contacts.update', $contact) }}" 
                  hx-target="#content" 
                  hx-swap="innerHTML"
                  hx-push-url="true" 
                  class="space-y-6">
                @csrf
                @method('PATCH') 
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" placeholder="Enter name" 
                           value="{{ $contact->name }}"
                           class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" placeholder="Enter email" 
                           value="{{ $contact->email }}"
                           class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" placeholder="Enter phone number" 
                           value="{{ $contact->phone }}"
                           class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-2 bg-green-500 text-black font-semibold rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Update
                    </button>
                    <a href="{{ route('contacts.index') }}" 
                       hx-get="{{ route('contacts.index') }}" 
                       hx-target="#content" 
                       hx-push-url="true"
                       class="inline-flex items-center px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
