@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Title and Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Activities</h2>
    </div>

    <!-- Filters and Search -->
    <div class="card shadow-sm border-secondary mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('activities.index') }}" id="filterForm" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by Customer..." value="{{ request('search') }}" oninput="submitForm()">
                </div>
                <div class="col-md-3">
                    <select name="sort" class="form-select" onchange="submitForm()">
                        <option value="">Sort by</option>
                        <option value="customer_name" {{ request('sort') == 'customer_name' ? 'selected' : '' }}>Customer (A-Z)</option>
                        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Date</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="type" class="form-select" onchange="submitForm()">
                        <option value="">Filter by Type</option>
                        <option value="Meeting" {{ request('type') == 'Meeting' ? 'selected' : '' }}>Meeting</option>
                        <option value="Follow-up" {{ request('type') == 'Follow-up' ? 'selected' : '' }}>Follow-up</option>
                        <option value="Call" {{ request('type') == 'Call' ? 'selected' : '' }}>Call</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('activities.create') }}" class="btn btn-success w-100">Add Activity</a>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Activities Table -->
    <div class="table-responsive">
        <table class="table table-hover border-secondary">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activities as $key => $activity)
                <tr>
                    <td>{{ $activities->firstItem() + $key }}</td>
                    <td>{{ $activity->customer->name ?? 'N/A' }}</td>
                    <td>{{ $activity->type }}</td>
                    <td>{{ $activity->description }}</td>
                    <td>{{ $activity->date }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No activities found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($activities->total() > 0)
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="text-muted">
            Showing {{ $activities->firstItem() }} to {{ $activities->lastItem() }} of {{ $activities->total() }} results
        </p>
    </div>
    @endif

    <div class="d-flex justify-content-center">
        {{ $activities->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }

    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this activity?');
    }
</script>
@endsection