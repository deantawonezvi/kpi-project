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
            'name'       => 'Employee1',
            'email'      => 'employee@test.com',
            'mobile'     => '0779123123',
            'type'       => 'Employee',
            'status'     => true,
            'password'   => bcrypt('12345'),
            'department' => 'Production'
        ]);
        User::create([
            'name'       => 'Supervisor1',
            'email'      => 'supervisor@test.com',
            'mobile'     => '0772123123',
            'type'       => 'Supervisor',
            'status'     => true,
            'password'   => bcrypt('12345'),
            'department' => 'Production'
        ]);
        User::create([
            'name'       => 'Manager1',
            'email'      => 'manager@test.com',
            'mobile'     => '0713123123',
            'type'       => 'Manager',
            'status'     => true,
            'password'   => bcrypt('12345'),
            'department' => 'Production'
        ]);
    }
}
