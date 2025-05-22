@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Opportunities</h2>

    <!-- Search and Filter -->
    <div class="card shadow-sm border-secondary mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('opportunities.index') }}" id="filterForm" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by Title or Customer"
                        value="{{ request('search') }}" oninput="submitForm()">
                </div>
                <div class="col-md-3">
                    <select name="sort" class="form-select" onchange="submitForm()">
                        <option value="">Sort by</option>
                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title (A-Z)</option>
                        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Date</option>
                        <option value="status" {{ request('sort') == 'status' ? 'selected' : '' }}>Status</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select" onchange="submitForm()">
                        <option value="">Filter by Status</option>
                        <option value="Open" {{ request('status') == 'Open' ? 'selected' : '' }}>Open</option>
                        <option value="Closed" {{ request('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('opportunities.create') }}" class="btn btn-success w-100">Add Opportunity</a>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Opportunities Table -->
    <div class="table-responsive">
        <table class="table table-hover border-secondary">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Customer</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($opportunities as $key => $opportunity)
                <tr>
                    <td>{{ $opportunities->firstItem() + $key }}</td>
                    <td>{{ $opportunity->title }}</td>
                    <td>{{ $opportunity->customer->name ?? 'N/A' }}</td>
                    <td>{{ $opportunity->description ?: '—' }}</td>
                    <td>
                        <span class="badge {{ $opportunity->status == 'Open' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $opportunity->status }}
                        </span>
                    </td>
                    <td>₱{{ number_format($opportunity->amount, 2) }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
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
                    <td colspan="7" class="text-center text-muted">No opportunities found. <a href="{{ route('opportunities.create') }}">Add one?</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($opportunities->total() > 0)
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-muted">
            Showing {{ $opportunities->firstItem() }} to {{ $opportunities->lastItem() }} of {{ $opportunities->total() }} results
        </p>
    </div>
    @endif

    <div class="d-flex justify-content-center">
        {{ $opportunities->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }

    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this opportunity?');
    }
</script>
@endsection