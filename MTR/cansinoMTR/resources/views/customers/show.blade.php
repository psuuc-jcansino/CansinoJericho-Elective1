@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Customer Details</h2>
        <a href="{{ route('customers.index') }}" class="btn btn-outline-dark">Back</a>
    </div>

    <div class="bg-light p-4 rounded shadow-sm border-start border-4 border-danger">
        <h3 class="text-primary">{{ $customer->name }}</h3>
        <p class="mb-1"><strong>Email:</strong> {{ $customer->email }}</p>
        <p class="mb-1"><strong>Phone:</strong> {{ $customer->phone }}</p>
        <p class="mb-1"><strong>Address:</strong> {{ $customer->address }}</p>
        <p class="text-muted"><small>Joined {{ $customer->created_at->diffForHumans() }}</small></p>
    </div>

    <!-- Opportunities Section -->
    <div class="mt-4">
        <h4 class="fw-bold">Opportunities</h4>
        @if ($customer->opportunities->isEmpty())
        <p class="text-muted">No opportunities found.</p>
        @else
        <ul class="list-group">
            @foreach ($customer->opportunities as $opportunity)
            <li class="list-group-item">
                <h5 class="mb-1 text-primary">{{ $opportunity->title }}</h5>
                <p class="mb-1"><strong>Description:</strong> {{ $opportunity->description }}</p>
                <p class="mb-1"><strong>Amount:</strong> ₱{{ number_format($opportunity->amount, 2) }}</p>
                <p class="mb-1"><strong>Status:</strong> {{ $opportunity->status }}</p>
                <p class="text-muted"><small>Created {{ $opportunity->created_at->diffForHumans() }}</small></p>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

    <!-- Interaction History Section -->
    <div class="mt-4">
        <h4 class="fw-bold">Interaction History</h4>
        @if ($customer->activities->isEmpty())
        <p class="text-muted">No recorded interactions.</p>
        @else
        <ul class="list-group">
            @foreach ($customer->activities as $activity)
            <li class="list-group-item">
                <strong>{{ $activity->type }}</strong>: {{ $activity->description }}
                <span class="text-muted d-block">Date: {{ $activity->date }} | Logged {{ $activity->created_at->diffForHumans() }}</span>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning px-4">Edit</a>
        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-4">Delete</button>
        </form>
    </div>
</div>

<script>
    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this customer?');
    }
</script>
@endsection