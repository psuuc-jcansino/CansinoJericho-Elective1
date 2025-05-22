<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Customer;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $activities = Activity::query()
            ->with('customer')
            ->when($request->search, function ($query) use ($request) {
                $query->whereHas('customer', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->sort, function ($query) use ($request) {
                if ($request->sort === 'customer_name') {
                    $query->orderBy(
                        Customer::select('name')
                            ->whereColumn('id', 'activities.customer_id')
                    );
                } elseif ($request->sort === 'date') {
                    $query->orderBy('date', 'desc');
                }
            })
            ->when($request->type, function ($query) use ($request) {
                $query->where('type', $request->type);
            });

        // Apply default sort if no sort is selected
        if (!$request->has('sort')) {
            $activities->orderBy('date', 'desc');
        }

        $activities = $activities->paginate(10);

        return view('activities.index', compact('activities'));
    }
    public function create()
    {
        $customers = Customer::all();
        return view('activities.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Activity::create($request->all());

        return redirect()->route('activities.index')->with('success', 'Activity created successfully!');
    }

    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $customers = Customer::all();
        return view('activities.edit', compact('activity', 'customers'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $activity->update($request->all());

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
