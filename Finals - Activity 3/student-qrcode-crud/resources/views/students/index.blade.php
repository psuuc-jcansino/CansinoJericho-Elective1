@extends('layouts.app')

@section('content')
<h1>Student List</h1>
<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

<form method="GET" action="{{ route('students.index') }}" class="mb-3">
    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search students...">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->age }}</td>
            <td>
                <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection