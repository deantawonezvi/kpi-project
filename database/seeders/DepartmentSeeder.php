<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name'       => 'Production'
        ]);

        Department::create([
            'name'       => 'IT'
        ]);

        Department::create([
            'name'       => 'Finance'
        ]);

        Department::create([
            'name'       => 'Sales'
        ]);

        Department::create([
            'name'       => 'Marketing'
        ]);
    }
}
