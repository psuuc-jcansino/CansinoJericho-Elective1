@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="card-body">
            <h2 class="mb-4 text-center">Add New Opportunity</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('opportunities.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="customer_id" class="form-label fw-bold">Customer</label>
                    <select id="customer_id" name="customer_id" class="form-select" required>
                        <option value="">-- Select a Customer --</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label fw-bold">Amount (₱)</label>
                    <input type="number" id="amount" name="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Add Opportunity</button>
                    <a href="{{ route('opportunities.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection