@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
      <h4>Student Details</h4>
    </div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-6">
          <p><strong>ID:</strong> {{ $student->id }}</p>
          <p><strong>First Name:</strong> {{ $student->firstname }}</p>
          <p><strong>Last Name:</strong> {{ $student->lastname }}</p>
          <p><strong>Email:</strong> {{ $student->email }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Address:</strong> {{ $student->address }}</p>
          <p><strong>Student ID:</strong> {{ $student->studentID }}</p>
          <p><strong>Course/Program:</strong> {{ $student->course }}</p>
          <p><strong>Year Level:</strong> {{ $student->yearlevel }}</p>
        </div>
      </div>

      <div class="text-center my-4">
        <div class="d-inline-block p-3 border rounded bg-white">
          {!! $qr !!}
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-rounded">Back to List</a>
      </div>
    </div>
  </div>
</div>
@endsection