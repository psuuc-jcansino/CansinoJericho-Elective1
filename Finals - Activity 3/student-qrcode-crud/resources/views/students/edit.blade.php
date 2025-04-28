@extends('layouts.app')

@section('content')
<h1>Edit Student</h1>
<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
    </div>
    <div class="mb-3">
        <label>Course</label>
        <input type="text" name="course" class="form-control" value="{{ $student->course }}" required>
    </div>
    <div class="mb-3">
        <label>Age</label>
        <input type="number" name="age" class="form-control" value="{{ $student->age }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
