<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $mis    = Department::where('dept_name', 'Management Information System')->value('dept_id');
        $design = Department::where('dept_name', 'Design')->value('dept_id');
        $cs     = Department::where('dept_name', 'Computer Science')->value('dept_id');

        $students = [
            ['student_name' => 'Kong Sopheak', 'email' => 'kongsopheak@gmail.com', 'gender' => 'Male',   'dob' => '2003-05-14', 'enrollment' => 4, 'enrollment_date' => '2022-01-01', 'dept_id' => $mis],
            ['student_name' => 'Ly Chhailin',  'email' => 'lin@gmail.com',         'gender' => 'Female', 'dob' => '2004-02-20', 'enrollment' => 4, 'enrollment_date' => '2022-01-01', 'dept_id' => $design],
            ['student_name' => 'Pov Nita',     'email' => 'povnita@gmail.com',     'gender' => 'Female', 'dob' => '2004-09-03', 'enrollment' => 3, 'enrollment_date' => '2023-04-11', 'dept_id' => $mis, 'description' => 'OK'],
            ['student_name' => 'Leng Makara',  'email' => 'lengmakara@gmail.com',  'gender' => 'Male',   'dob' => '2005-11-30', 'enrollment' => 2, 'enrollment_date' => '2024-11-01', 'dept_id' => $design],
            ['student_name' => 'Sok Dara',     'email' => 'sokdara@gmail.com',     'gender' => 'Male',   'dob' => '2005-07-08', 'enrollment' => 1, 'enrollment_date' => '2025-10-15', 'dept_id' => $cs],
        ];

        foreach ($students as $s) {
            Student::create($s);
        }
    }
}
