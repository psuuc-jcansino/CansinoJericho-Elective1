@extends('layouts.app')

@section('content')
<h1>Student Details</h1>
<p><strong>Name:</strong> {{ $student->name }}</p>
<p><strong>Email:</strong> {{ $student->email }}</p>
<p><strong>Course:</strong> {{ $student->course }}</p>
<p><strong>Age:</strong> {{ $student->age }}</p>

<h3>QR Code:</h3>
<div>{!! $qrCode !!}</div>
@endsection