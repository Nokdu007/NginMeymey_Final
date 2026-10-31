@php($dp = $department ?? null)
@php($departmentOptions = ['MIS', 'BIT', 'Design'])
@if ($dp && !in_array($dp->dept_name, $departmentOptions, true))
    @php($departmentOptions[] = $dp->dept_name)
@endif
<div class="mb-3">
    <label class="form-label">Department Name</label>
    <select name="dept_name" class="form-select @error('dept_name') is-invalid @enderror" required>
        <option value="">-- Select department --</option>
        @foreach ($departmentOptions as $name)
            <option value="{{ $name }}" @selected(old('dept_name', $dp?->dept_name) === $name)>{{ $name }}</option>
        @endforeach
    </select>
    @error('dept_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Manager ID</label>
        <input type="number" name="manager_id" class="form-control @error('manager_id') is-invalid @enderror"
               value="{{ old('manager_id', $dp?->manager_id) }}">
        @error('manager_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Location ID</label>
        <input type="number" name="location_id" class="form-control @error('location_id') is-invalid @enderror"
               value="{{ old('location_id', $dp?->location_id) }}">
        @error('location_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
