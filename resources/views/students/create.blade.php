@extends('layouts.app')
@section('title', 'Student Registration')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="panel">
            <div class="hero">
                <h3 class="fw-bold"><i class="bi bi-mortarboard-fill"></i> Student Registration</h3>
                <p>Complete the form below to register a new student</p>
            </div>
            <form method="POST" action="{{ route('students.store') }}" class="p-4">
                @csrf
                @include('students._form')
                <div class="d-flex gap-2">
                    <button class="btn btn-primary flex-fill"><i class="bi bi-send-fill"></i> Submit Registration</button>
                    <button type="reset" class="btn btn-light flex-fill"><i class="bi bi-arrow-counterclockwise"></i> Reset Form</button>
                    <a href="{{ route('students.index') }}" class="btn btn-info text-white flex-fill"><i class="bi bi-list-ul"></i> View Student List</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
