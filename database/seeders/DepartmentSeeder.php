<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['dept_name' => 'MIS',                           'manager_id' => 101, 'location_id' => 1],
            ['dept_name' => 'BIT',                           'manager_id' => 102, 'location_id' => 2],
            ['dept_name' => 'Design',                        'manager_id' => 103, 'location_id' => 2],
            ['dept_name' => 'Management Information System', 'manager_id' => 104, 'location_id' => 1],
            ['dept_name' => 'Computer Science',              'manager_id' => 105, 'location_id' => 1],
            ['dept_name' => 'Accounting',                    'manager_id' => 106, 'location_id' => 3],
        ];

        foreach ($departments as $d) {
            Department::firstOrCreate(
                ['dept_name' => $d['dept_name']],
                ['manager_id' => $d['manager_id'], 'location_id' => $d['location_id']]
            );
        }
    }
}
