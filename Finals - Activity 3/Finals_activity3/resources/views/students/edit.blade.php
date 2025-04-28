@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Student</h1>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            ← Back to Records
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops!</strong> Please fix the following errors:
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control"
                        value="{{ old('firstname', $student->firstname) }}" placeholder="Juan" required>
                </div>

                <div class="col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control"
                        value="{{ old('lastname', $student->lastname) }}" placeholder="Dela Cruz" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $student->email) }}" placeholder="juan@example.com" required>
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control"
                        value="{{ old('address', $student->address) }}" placeholder="Manila, Philippines" required>
                </div>

                <div class="col-md-6">
                    <label for="studentID" class="form-label">Student ID</label>
                    <input type="text" name="studentID" class="form-control"
                        value="{{ old('studentID', $student->studentID) }}" placeholder="STUD-XXXX" required>
                </div>

                <div class="col-md-6">
                    <label for="course" class="form-label">Program</label>
                    <select name="course" class="form-select" required>
                        <option value="" disabled>-- Select Program --</option>
                        <option value="BS Information Technology" {{ old('course', $student->course) == 'BS Information Technology' ? 'selected' : '' }}>BS Information Technology</option>
                        <option value="AB English Language" {{ old('course', $student->course) == 'AB English Language' ? 'selected' : '' }}>AB English Language</option>
                        <option value="Bachelor of Early Childhood Education" {{ old('course', $student->course) == 'Bachelor of Early Childhood Education' ? 'selected' : '' }}>Bachelor of Early Childhood Education</option>
                        <option value="Bachelor of Secondary Education" {{ old('course', $student->course) == 'Bachelor of Secondary Education' ? 'selected' : '' }}>Bachelor of Secondary Education</option>
                        <option value="BS Civil Engineering" {{ old('course', $student->course) == 'BS Civil Engineering' ? 'selected' : '' }}>BS Civil Engineering</option>
                        <option value="BS Electrical Engineering" {{ old('course', $student->course) == 'BS Electrical Engineering' ? 'selected' : '' }}>BS Electrical Engineering</option>
                        <option value="BS Mechanical Engineering" {{ old('course', $student->course) == 'BS Mechanical Engineering' ? 'selected' : '' }}>BS Mechanical Engineering</option>
                        <option value="BS Computer Engineering" {{ old('course', $student->course) == 'BS Computer Engineering' ? 'selected' : '' }}>BS Computer Engineering</option>
                        <option value="BS Mathematics" {{ old('course', $student->course) == 'BS Mathematics' ? 'selected' : '' }}>BS Mathematics</option>
                        <option value="BS Architecture" {{ old('course', $student->course) == 'BS Architecture' ? 'selected' : '' }}>BS Architecture</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="yearlevel" class="form-label">Year Level</label>
                    <select name="yearlevel" class="form-select" required>
                        <option value="" disabled>-- Select Year Level --</option>
                        <option value="1st Year" {{ old('yearlevel', $student->yearlevel) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                        <option value="2nd Year" {{ old('yearlevel', $student->yearlevel) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                        <option value="3rd Year" {{ old('yearlevel', $student->yearlevel) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                        <option value="4th Year" {{ old('yearlevel', $student->yearlevel) == '4th Year' ? 'selected' : '' }}>4th Year</option>
                    </select>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Update Student</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection