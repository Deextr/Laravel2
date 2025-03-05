<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::where('user_id', Auth::id())->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20'
        ]);

        Contacts::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return view('contacts.index', ['contacts' => Contacts::where('user_id', Auth::id())->get()]);
    }

    public function edit(Contacts $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contacts $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|string|max:20'
        ]);

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        // Return updated contacts list via HTMX
        return view('contacts.index', ['contacts' => Contacts::where('user_id', Auth::id())->get()]);
    }

    public function destroy(Contacts $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $contact->delete();
        return response(''); // Empty response with no content
    }
}
