@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-danger">Customers</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-success px-4 py-2 shadow">
            <i class="fas fa-plus me-1"></i> Add Customer
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($customers->isEmpty())
    <p class="text-center text-muted">No customers found.</p>
    @else
    <div class="row">
        @foreach($customers as $customer)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title text-dark fw-bold">{{ $customer->name }}</h5>
                    <p class="card-text text-muted">
                        <i class="fas fa-envelope"></i> {{ $customer->email }} <br>
                        <i class="fas fa-phone"></i> {{ $customer->phone }} <br>
                        <i class="fas fa-map-marker-alt"></i> {{ $customer->address }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- JavaScript for Confirmation Dialog -->
<script>
    function confirmDelete() {
        return window.confirm('Are you sure you want to delete this customer?');
    }
</script>
@endsection