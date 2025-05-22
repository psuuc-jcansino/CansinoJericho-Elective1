<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Search by name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sort by name or date (use default sort: created_at desc if none)
        if ($request->has('sort_by') && in_array($request->sort_by, ['name', 'created_at'])) {
            $query->orderBy($request->sort_by, 'asc');
        } else {
            // Default: newest first
            $query->orderBy('created_at', 'desc');
        }

        $customers = $query->paginate(9);

        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function show(Customer $customer)
    {
        $customer->load(['activities', 'opportunities']);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
