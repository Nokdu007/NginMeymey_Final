@extends('layouts.app')
@section('title', 'Departments')

@section('content')
<div class="panel">
    <div class="hero">
        <h2 class="fw-bold"><i class="bi bi-building"></i> Departments</h2>
        <p>Manage the departments students belong to</p>
    </div>
    <div class="p-4">
        <form method="GET" action="{{ route('departments.index') }}" class="row g-2 mb-4">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search department by name...">
                </div>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button class="btn btn-primary w-100">Search</button>
                <a href="{{ route('departments.index') }}" class="btn btn-light" title="Clear"><i class="bi bi-x-lg"></i></a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead><tr><th>ID</th><th>Department Name</th><th>Manager ID</th><th>Location ID</th><th>Students</th><th class="text-end">Actions</th></tr></thead>
                <tbody>
                @forelse ($departments as $d)
                    <tr>
                        <td class="fw-bold">{{ $d->dept_id }}</td>
                        <td>{{ $d->dept_name }}</td>
                        <td>{{ $d->manager_id ?? 'N/A' }}</td>
                        <td>{{ $d->location_id ?? 'N/A' }}</td>
                        <td><a href="{{ route('students.index', ['dept_id' => $d->dept_id]) }}" class="badge badge-dept rounded-pill text-decoration-none px-3 py-2">{{ $d->students_count }}</a></td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('departments.edit', $d) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('departments.destroy', $d) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this department?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No departments found. Add one below.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $departments->links('pagination::bootstrap-5') }}
        <a href="{{ route('departments.create') }}" class="btn btn-primary w-100 mt-3 py-2"><i class="bi bi-plus-lg"></i> Add Department</a>
    </div>
</div>
@endsection
