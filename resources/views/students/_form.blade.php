@php($st = $student ?? null)

<h6 class="section-title"><i class="bi bi-person-circle"></i> Personal Information</h6>
<div class="mb-3">
    <label class="form-label">Student Name</label>
    <input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror"
           value="{{ old('student_name', $st?->student_name) }}" placeholder="Student Name" required>
    @error('student_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Email Address</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $st?->email) }}" placeholder="Email Address" required>
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
            <option value="">-- Select gender --</option>
            @foreach (['Male', 'Female', 'Other'] as $g)
                <option value="{{ $g }}" @selected(old('gender', $st?->gender) === $g)>{{ $g }}</option>
            @endforeach
        </select>
        @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
               value="{{ old('dob', $st?->dob?->format('Y-m-d')) }}">
        @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<h6 class="section-title mt-2"><i class="bi bi-bank"></i> Academic Information</h6>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Enrollment Date</label>
        <input type="date" name="enrollment_date" class="form-control @error('enrollment_date') is-invalid @enderror"
               value="{{ old('enrollment_date', $st?->enrollment_date?->format('Y-m-d')) }}" required>
        @error('enrollment_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Years Enrolled</label>
        <input type="number" min="0" max="20" name="enrollment" class="form-control @error('enrollment') is-invalid @enderror"
               value="{{ old('enrollment', $st?->enrollment) }}" placeholder="Years Enrolled">
        @error('enrollment') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Department</label>
    <select name="dept_id" class="form-select @error('dept_id') is-invalid @enderror" required>
        <option value="">-- Select department --</option>
        @foreach ($departments as $d)
            <option value="{{ $d->dept_id }}" @selected(old('dept_id', $st?->dept_id) == $d->dept_id)>{{ $d->dept_name }}</option>
        @endforeach
    </select>
    @error('dept_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-4">
    <label class="form-label fw-semibold"><i class="bi bi-file-earmark-text text-primary"></i> Additional Information</label>
    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
              placeholder="Enter any additional information about the student">{{ old('description', $st?->description) }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
