@extends('layouts.app')
@section('title', 'Edit Student')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="panel">
            <div class="hero">
                <h3 class="fw-bold"><i class="bi bi-pencil-square"></i> Edit Student #{{ $student->student_id }}</h3>
                <p>Update the details of {{ $student->student_name }}</p>
            </div>
            <form method="POST" action="{{ route('students.update', $student) }}" class="p-4">
                @csrf @method('PUT')
                @include('students._form')
                <div class="d-flex gap-2">
                    <button class="btn btn-success flex-fill"><i class="bi bi-check-lg"></i> Save Changes</button>
                    <a href="{{ route('students.index') }}" class="btn btn-light flex-fill">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
