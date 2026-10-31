@extends('layouts.app')
@section('title', 'Department')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="panel">
            <div class="hero"><h3 class="fw-bold"><i class="bi bi-building"></i> Edit Department #{{ $department->dept_id }}</h3></div>
            <form method="POST" action="{{ route('departments.update', $department) }}" class="p-4">
                @csrf @method('PUT')
                @include('departments._form')
                <div class="d-flex gap-2">
                    <button class="btn btn-primary flex-fill">Save Changes</button>
                    <a href="{{ route('departments.index') }}" class="btn btn-light flex-fill">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
