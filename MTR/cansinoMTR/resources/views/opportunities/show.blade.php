@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Opportunity Details</h2>
        <a href="{{ route('opportunities.index') }}" class="btn btn-outline-dark">Back</a>
    </div>

    <div class="bg-light p-4 rounded shadow-sm border-start border-4 border-primary">
        <h3 class="text-primary">{{ $opportunity->title }}</h3>
        <p class="mb-1"><strong>Description:</strong> {{ $opportunity->description }}</p>
        <p class="mb-1"><strong>Status:</strong> {{ $opportunity->status }}</p>
        <p class="mb-1"><strong>Amount:</strong> ₱{{ number_format($opportunity->amount, 2) }}</p>
        <p class="text-muted"><small>Created {{ $opportunity->created_at->diffForHumans() }}</small></p>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('opportunities.edit', $opportunity->id) }}" class="btn btn-warning px-4">Edit</a>
        <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-4">Delete</button>
        </form>
    </div>
</div>

<script>
    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this opportunity?');
    }
</script>
@endsection