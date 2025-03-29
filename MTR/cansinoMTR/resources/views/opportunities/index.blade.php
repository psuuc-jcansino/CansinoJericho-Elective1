@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Opportunities</h2>
        <a href="{{ route('opportunities.create') }}" class="btn btn-success">Add Opportunity</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover border-secondary">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($opportunities as $key => $opportunity)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $opportunity->title }}</td>
                    <td>{{ $opportunity->description }}</td>
                    <td>
                        <span class="badge {{ $opportunity->status == 'Open' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $opportunity->status }}
                        </span>
                    </td>
                    <td>₱{{ number_format($opportunity->amount, 2) }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('opportunities.show', $opportunity->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('opportunities.edit', $opportunity->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No opportunities found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this opportunity?');
    }
</script>
@endsection