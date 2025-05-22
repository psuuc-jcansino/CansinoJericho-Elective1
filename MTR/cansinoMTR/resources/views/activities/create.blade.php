@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="card-body">
            <h2 class="mb-4 text-center">Add Activity</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('activities.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Customer</label>
                    <select name="customer_id" class="form-select" required>
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Type</label>
                    <select name="type" class="form-select" required>
                        <option value="">Select Type</option>
                        <option value="Call">Call</option>
                        <option value="Meeting">Meeting</option>
                        <option value="Follow-up">Follow-up</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Date</label>
                    <input type="date" name="date" class="form-control" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Add Activity</button>
                    <a href="{{ route('activities.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection