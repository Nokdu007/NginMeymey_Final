<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));

        $students = Student::with('department')
            // Search by name (also email / department name)
            ->when($search, function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('student_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhereHas('department', fn ($d) => $d->where('dept_name', 'like', "%{$search}%"));
                });
            })
            // Filters
            ->when($request->filled('dept_id'), fn ($q) => $q->where('dept_id', $request->dept_id))
            ->when($request->filled('gender'), fn ($q) => $q->where('gender', $request->gender))
            // Sorting
            ->when($request->input('sort') === 'oldest', fn ($q) => $q->orderBy('student_id'),
                fn ($q) => $request->input('sort') === 'name'
                    ? $q->orderBy('student_name')
                    : $q->orderByDesc('student_id'))
            ->paginate(10)
            ->withQueryString();

        $departments = Department::orderBy('dept_name')->get();

        $stats = [
            'total' => Student::count(),
            'departments' => Department::count(),
            'avg' => round((float) Student::avg('enrollment'), 1),
        ];

        return view('students.index', compact('students', 'departments', 'stats', 'search'));
    }

    public function create()
    {
        $departments = Department::orderBy('dept_name')->get();

        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Student::create($this->validated($request));

        return redirect()->route('students.index')->with('success', 'Student registered.');
    }

    public function show(Student $student)
    {
        $student->load('department');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $departments = Department::orderBy('dept_name')->get();

        return view('students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($this->validated($request, $student));

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }

    private function validated(Request $request, ?Student $student = null): array
    {
        return $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',
                Rule::unique('students', 'email')->ignore($student?->student_id, 'student_id')],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'dob' => ['nullable', 'date', 'before:today'],
            'enrollment' => ['nullable', 'integer', 'min:0', 'max:20'],
            'enrollment_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:1000'],
            'dept_id' => ['required', 'exists:departments,dept_id'],
        ]);
    }
}
