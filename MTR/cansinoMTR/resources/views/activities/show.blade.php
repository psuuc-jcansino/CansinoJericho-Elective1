@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Activity Details</h2>
        <a href="{{ route('activities.index') }}" class="btn btn-outline-dark">Back</a>
    </div>

    <div class="bg-light p-4 rounded shadow-sm border-start border-4 border-primary">
        <h3 class="text-primary">{{ $activity->name }}</h3>
        <p class="mb-1"><strong>Customer:</strong> {{ $activity->customer->name ?? 'N/A' }}</p>
        <p class="mb-1"><strong>Type:</strong> {{ $activity->type }}</p>
        <p class="mb-1"><strong>Description:</strong> {{ $activity->description }}</p>
        <p class="mb-1"><strong>Date:</strong> {{ $activity->date }}</p>
        <p class="text-muted"><small>Created {{ $activity->created_at->diffForHumans() }}</small></p>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning px-4">Edit</a>
        <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-4">Delete</button>
        </form>
    </div>
</div>

<script>
    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this activity?');
    }
</script>
@endsection