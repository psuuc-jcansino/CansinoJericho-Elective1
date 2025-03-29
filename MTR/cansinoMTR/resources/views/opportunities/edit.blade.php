@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%;">
        <div class="card-body">
            <h2 class="mb-4 text-center">Edit Opportunity</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('opportunities.update', $opportunity->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $opportunity->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $opportunity->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="Open" {{ old('status', $opportunity->status) == 'Open' ? 'selected' : '' }}>Open</option>
                        <option value="Closed" {{ old('status', $opportunity->status) == 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label fw-bold">Amount (₱)</label>
                    <input type="number" id="amount" name="amount" class="form-control" step="0.01" value="{{ old('amount', $opportunity->amount) }}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">Update Opportunity</button>
                    <a href="{{ route('opportunities.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection