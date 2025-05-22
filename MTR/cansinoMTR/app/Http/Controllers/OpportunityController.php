<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\Customer;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $query = Opportunity::with('customer');

        // Search by Customer or Title
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($query) use ($request) {
                $query->whereHas('customer', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                })
                    ->orWhere('title', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Apply sorting if specified
        if ($request->has('sort') && $request->sort != '') {
            switch ($request->sort) {
                case 'title':
                    $query->orderBy('title', 'asc');
                    break;
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'status':
                    $query->orderByRaw("status = 'Open' DESC")->orderBy('status', 'asc');
                    break;
                case 'customer':
                    $query->orderBy(Customer::select('name')->whereColumn('id', 'opportunities.customer_id'), 'asc');
                    break;
                default:
                    // Fallback: newest first
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            // Default sorting when no sort is provided
            $query->orderBy('created_at', 'desc');
        }

        // Paginate the results (10 per page)
        $opportunities = $query->paginate(10);

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
