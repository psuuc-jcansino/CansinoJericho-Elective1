@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="card-body">
            <h2 class="mb-4 text-center">Edit Customer</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $customer->address) }}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">Update Customer</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection