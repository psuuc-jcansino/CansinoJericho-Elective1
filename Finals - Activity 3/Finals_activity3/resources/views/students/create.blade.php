@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Create Student</h1>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            ← Back to Records
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops!</strong> There were some problems with your input:
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
            <form action="{{ route('students.store') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Juan" required>
                </div>

                <div class="col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Dela Cruz" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="juan@gmail.com" required>
                </div>

                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Pangasinan, Philippines" required>
                </div>

                <div class="col-md-6">
                    <label for="studentID" class="form-label">Student ID</label>
                    <input type="text" name="studentID" class="form-control" placeholder="STUD-XXXX" required>
                </div>

                <div class="col-md-6">
                    <label for="course" class="form-label">Program</label>
                    <select name="course" class="form-select" required>
                        <option value="" disabled selected>-- Select Program --</option>
                        <option value="BS Information Technology">BS Information Technology</option>
                        <option value="AB English Language">AB English Language</option>
                        <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
                        <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                        <option value="BS Civil Engineering">BS Civil Engineering</option>
                        <option value="BS Electrical Engineering">BS Electrical Engineering</option>
                        <option value="BS Mechanical Engineering">BS Mechanical Engineering</option>
                        <option value="BS Computer Engineering">BS Computer Engineering</option>
                        <option value="BS Mathematics">BS Mathematics</option>
                        <option value="BS Architecture">BS Architecture</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="yearlevel" class="form-label">Year Level</label>
                    <select name="yearlevel" class="form-select" required>
                        <option value="" disabled selected>-- Select Year Level --</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">Create Student</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection