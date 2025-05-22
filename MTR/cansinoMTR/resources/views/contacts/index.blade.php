@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Contacts List</h2>

    <!-- Search and Filter Section -->
    <div class="card shadow-sm border-secondary mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('contacts.index') }}" id="filterForm" class="row g-3">
                <!-- Search Bar -->
                <div class="col-md-7"> <!-- Increased the width of the search bar -->
                    <input type="text" name="search" class="form-control" placeholder="Search by Name or Customer"
                        value="{{ request('search') }}" oninput="submitForm()">
                </div>

                <!-- Sort Dropdown -->
                <div class="col-md-3">
                    <select name="sort" class="form-select" onchange="submitForm()">
                        <option value="">Sort by</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                        <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date</option>
                    </select>
                </div>

                <!-- Add Contact Button -->
                <div class="col-md-2 text-end">
                    <a href="{{ route('contacts.create') }}" class="btn btn-success w-100">Add Contact</a>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Contacts Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $key => $contact)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $contact->customer->name ?? 'N/A' }}</td>
                    <td class="fw-bold text-danger">{{ $contact->name }}</td>
                    <td>{{ $contact->position }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No contacts found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Centered Showing results message -->
    <div style="display: inline-block; margin: 0 auto;">
        <p class="text-muted">Showing results {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }}</p>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }

    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this contact?');
    }
</script>
@endsection