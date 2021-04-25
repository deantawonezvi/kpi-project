<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name'     => 'Employee1',
            'email'    => 'employee@test.com',
            'type'     => 'Employee',
            'password' => bcrypt('12345'),
           'department'=>'Production'
        ]);
        User::create([
            'name'     => 'Supervisor1',
            'email'    => 'supervisor@test.com',
            'type'     => 'Supervisor',
            'password' => bcrypt('12345'),
           'department'=>'Production'
        ]);
        User::create([
            'name'     => 'Manager1',
            'email'    => 'manager@test.com',
            'type'     => 'Manager',
            'password' => bcrypt('12345'),
           'department'=>'Production'
        ]);
    }
}
