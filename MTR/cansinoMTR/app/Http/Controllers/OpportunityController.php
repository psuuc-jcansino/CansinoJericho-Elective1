<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\Customer;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::with('customer')->get();
        return view('opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('opportunities.create', compact('customers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Open,Closed',
            'amount' => 'required|numeric|min:0',
        ]);


        Opportunity::create([
            'customer_id' => $request->customer_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'amount' => $request->amount,
        ]);


        return redirect()->route('opportunities.index')->with('success', 'Opportunity created successfully.');
    }

    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        $customers = Customer::all();
        return view('opportunities.edit', compact('opportunity', 'customers'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'amount' => 'required|numeric',
        ]);

        $opportunity->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'amount' => $request->amount,
        ]);

        return redirect()->route('opportunities.index')->with('success', 'Opportunity updated successfully.');
    }


    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return redirect()->route('opportunities.index')->with('success', 'Opportunity deleted successfully.');
    }
}
