@extends('layouts.app')

@section('content')
<div class="container">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Student Records</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-rounded">+ New Student</a>
  </div>

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5 class="card-title">🔍 Filter Students</h5>
      <form method="GET" action="{{ route('students.index') }}" class="row g-3 align-items-end">
        <div class="col-md-6">
          <select name="course" class="form-select">
            <option value="">All Programs</option>
            @foreach([
            'BS Information Technology',
            'AB English Language',
            'Bachelor of Early Childhood Education',
            'Bachelor of Secondary Education',
            'BS Civil Engineering',
            'BS Electrical Engineering',
            'BS Mechanical Engineering',
            'BS Computer Engineering',
            'BS Mathematics',
            'BS Architecture'
            ] as $course)
            <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>
              {{ $course }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6 d-flex gap-2">
          <button type="submit" class="btn btn-primary btn-rounded">Apply</button>
          <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-rounded">Clear</a>
        </div>
      </form>
    </div>
  </div>

  <div class="table-responsive">
    <table id="myTable" class="table table-hover table-striped align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Student ID</th>
          <th>Program /Course</th>
          <th>Created</th>
          <th>Updated</th>
          <th style="width: 90px;">QR Code</th>
          <th style="width: 160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->firstname }}</td>
          <td>{{ $student->lastname }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->address }}</td>
          <td>{{ $student->studentID }}</td>
          <td>{{ $student->course }}</td>
          <td>{{ $student->created_at->format('Y-m-d') }}</td>
          <td>{{ $student->updated_at->format('Y-m-d') }}</td>

          <!-- QR Code -->
          <td class="text-center">
            <div style="width: 60px; height: 60px; margin: auto;">
              <div style="width: 100%; height: 100%; overflow: hidden;">
                {!! $student->qr !!}
              </div>
            </div>
          </td>

          <!-- Actions -->
          <td>
            <div class="d-flex justify-content-center gap-1">
              <a href="{{ route('students.show', $student->id) }}" class="btn btn-success btn-sm">
                view
              </a>
              <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                edit
              </a>
              <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  delete
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="11" class="text-center">No students found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>


</div>
@endsection