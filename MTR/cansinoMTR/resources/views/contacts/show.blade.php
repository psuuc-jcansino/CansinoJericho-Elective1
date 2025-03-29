@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Contact Details</h2>
        <a href="{{ route('contacts.index') }}" class="btn btn-outline-dark">Back</a>
    </div>

    <div class="bg-light p-4 rounded shadow-sm border-start border-4 border-danger">
        <h3 class="text-danger">{{ $contact->name }}</h3>
        <p class="mb-1"><strong>Customer:</strong> {{ $contact->customer->name ?? 'N/A' }}</p>
        <p class="mb-1"><strong>Position:</strong> {{ $contact->position }}</p>
        <p class="mb-1"><strong>Email:</strong> {{ $contact->email }}</p>
        <p class="mb-1"><strong>Phone:</strong> {{ $contact->phone }}</p>
        <p class="text-muted"><small>Added {{ $contact->created_at->diffForHumans() }}</small></p>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning px-4">Edit</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-4">Delete</button>
        </form>
    </div>
</div>

<script>
    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this contact?');
    }
</script>
@endsection