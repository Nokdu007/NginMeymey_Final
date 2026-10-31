@extends('layouts.app')
@section('title', 'Student Directory')

@section('content')
<div class="panel">
    <div class="hero">
        <h2 class="fw-bold"><i class="bi bi-mortarboard-fill"></i> Student Directory</h2>
        <p>Browse and manage all registered students</p>
        <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
            <div class="stat"><strong>{{ $stats['total'] }}</strong>Total Students</div>
            <div class="stat"><strong>{{ $stats['departments'] }}</strong>Departments</div>
            <div class="stat"><strong>{{ $stats['avg'] }} yrs</strong>Avg. Enrollment</div>
        </div>
    </div>

    <div class="p-4">
        {{-- Search & filter --}}
        <form method="GET" action="{{ route('students.index') }}" class="row g-2 mb-4">
            <div class="col-12">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" value="{{ $search }}" class="form-control"
                           placeholder="Search students by name, email, or department...">
                </div>
            </div>
            <div class="col-md-4">
                <select name="dept_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All Departments</option>
                    @foreach ($departments as $d)
                        <option value="{{ $d->dept_id }}" @selected(request('dept_id') == $d->dept_id)>{{ $d->dept_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="newest" @selected(request('sort', 'newest') === 'newest')>Newest First</option>
                    <option value="oldest" @selected(request('sort') === 'oldest')>Oldest First</option>
                    <option value="name" @selected(request('sort') === 'name')>Name A–Z</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="gender" class="form-select" onchange="this.form.submit()">
                    <option value="">All Genders</option>
                    @foreach (['Male', 'Female', 'Other'] as $g)
                        <option value="{{ $g }}" @selected(request('gender') === $g)>{{ $g }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button class="btn btn-primary w-100"><i class="bi bi-funnel"></i> Filter</button>
                <a href="{{ route('students.index') }}" class="btn btn-light" title="Clear"><i class="bi bi-x-lg"></i></a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                <tr>
                    <th>ID</th><th>Student</th><th>Contact</th><th>Enrollment</th><th>Department</th><th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($students as $s)
                    <tr>
                        <td class="fw-bold">{{ $s->student_id }}</td>
                        <td><div class="fw-bold">{{ $s->student_name }}</div><small class="text-muted">{{ $s->gender }}</small></td>
                        <td>
                            <div><i class="bi bi-envelope-fill text-primary"></i> {{ $s->email }}</div>
                            <small><i class="bi bi-file-earmark-text text-primary"></i> {{ $s->description ?: 'N/A' }}</small>
                        </td>
                        <td>
                            <div><i class="bi bi-calendar-event text-primary"></i> {{ $s->enrollment_date->format('M d, Y') }}</div>
                            <small><i class="bi bi-clock text-primary"></i> {{ $s->enrollment }} years</small>
                        </td>
                        <td><span class="badge badge-dept rounded-pill px-3 py-2"><i class="bi bi-building"></i> {{ $s->department->dept_name }}</span></td>
                        <td class="text-end text-nowrap">
                            <a href="{{ route('students.show', $s) }}" class="btn btn-sm btn-outline-primary" title="View"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('students.edit', $s) }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('students.destroy', $s) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this student?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">No students match your search. Try another name or clear the filters.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <small class="text-muted">Showing {{ $students->firstItem() ?? 0 }} to {{ $students->lastItem() ?? 0 }} of {{ $students->total() }} entries</small>
            {{ $students->links('pagination::bootstrap-5') }}
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary w-100 mt-3 py-2"><i class="bi bi-person-plus-fill"></i> Add New Student</a>
    </div>
</div>
@endsection
