@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 border border-dark rounded-4" style="max-width: 700px; width: 100%;">
        <div class="card-body">
            <h2 class="mb-4 text-center text-dark fw-bold">Edit Contact</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Customer</label>
                    <select name="customer_id" class="form-select border border-dark" required>
                        <option value="">-- Select a Customer --</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $contact->customer_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark">Name</label>
                        <input type="text" name="name" class="form-control border border-dark" value="{{ $contact->name }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark">Position</label>
                        <input type="text" name="position" class="form-control border border-dark" value="{{ $contact->position }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark">Email</label>
                        <input type="email" name="email" class="form-control border border-dark" value="{{ $contact->email }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark">Phone</label>
                        <input type="text" name="phone" class="form-control border border-dark" value="{{ $contact->phone }}" required>
                    </div>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-warning fw-bold">Update</button>
                    <a href="{{ route('contacts.index') }}" class="btn btn-outline-dark fw-bold">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection