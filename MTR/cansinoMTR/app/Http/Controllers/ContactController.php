<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Get the search term and sort option
        $searchTerm = $request->input('search');
        $sortBy = $request->input('sort');

        // Initialize the query builder
        $contactsQuery = Contact::with('customer');

        // Apply search term if provided
        if ($searchTerm) {
            $contactsQuery->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('position', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('customer', function ($customerQuery) use ($searchTerm) {
                        $customerQuery->where('name', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        // Apply sorting: default to created_at DESC if no sort option is provided
        if ($sortBy === 'name') {
            $contactsQuery->orderBy('name', 'asc'); // A-Z
        } else {
            // Default sort or if explicitly requested: newest first
            $contactsQuery->orderBy('created_at', 'desc');
        }

        // Paginate contacts
        $contacts = $contactsQuery->paginate(10);

        // Return the view with contacts and filters
        return view('contacts.index', compact('contacts', 'searchTerm', 'sortBy'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('contacts.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $customers = Customer::all();
        return view('contacts.edit', compact('contact', 'customers'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required',
            'position' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
