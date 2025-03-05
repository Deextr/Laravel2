@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Your Contacts</h1>
            <a href="{{ route('contacts.create') }}" 
               hx-get="{{ route('contacts.create') }}" 
               hx-target="#content" 
               hx-push-url="true"
               class="inline-flex items-center px-4 py-2 bg-green-500 text-black font-semibold rounded-md hover:bg-green-600 transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Contact
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                
                <!-- HTMX Target for Table Rows -->
                <tbody id="contacts-table" class="divide-y divide-gray-100">
                    @foreach ($contacts as $contact)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-center text-sm text-gray-800 font-medium align-middle">{{ $contact->name }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600 align-middle">{{ $contact->email }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-600 align-middle">{{ $contact->phone }}</td>
                            <td class="px-6 py-4 text-center text-sm align-middle whitespace-nowrap">
                                <div class="flex justify-center space-x-4">
                                    <!-- Edit Button -->
                                    <a href="{{ route('contacts.edit', $contact->id) }}" 
                                       hx-get="{{ route('contacts.edit', $contact->id) }}" 
                                       hx-target="#content" 
                                       hx-push-url="true"
                                       class="text-blue-500 hover:text-blue-700 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form hx-delete="{{ route('contacts.destroy', $contact->id) }}" 
                                          hx-target="closest tr" 
                                          hx-swap="outerHTML swap:1s" 
                                          hx-confirm="Are you sure you want to delete this contact?"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-700 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
