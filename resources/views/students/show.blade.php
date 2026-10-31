@extends('layouts.app')
@section('title', $student->student_name)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="panel">
            <div class="hero">
                <h3 class="fw-bold">{{ $student->student_name }}</h3>
                <p>Student #{{ $student->student_id }}</p>
            </div>
            <div class="p-4">
                <table class="table">
                    <tr><th style="width:40%">Email</th><td>{{ $student->email }}</td></tr>
                    <tr><th>Gender</th><td>{{ $student->gender }}</td></tr>
                    <tr><th>Date of Birth</th><td>{{ $student->dob?->format('M d, Y') ?? 'N/A' }}</td></tr>
                    <tr><th>Enrollment Date</th><td>{{ $student->enrollment_date->format('M d, Y') }}</td></tr>
                    <tr><th>Years Enrolled</th><td>{{ $student->enrollment }}</td></tr>
                    <tr><th>Department</th><td>{{ $student->department->dept_name }}</td></tr>
                    <tr><th>Description</th><td>{{ $student->description ?: 'N/A' }}</td></tr>
                    <tr><th>Created</th><td>{{ $student->created_at->format('M d, Y H:i') }}</td></tr>
                    <tr><th>Updated</th><td>{{ $student->updated_at->format('M d, Y H:i') }}</td></tr>
                </table>
                <div class="d-flex gap-2">
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-success flex-fill"><i class="bi bi-pencil-square"></i> Edit</a>
                    <a href="{{ route('students.index') }}" class="btn btn-light flex-fill">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
