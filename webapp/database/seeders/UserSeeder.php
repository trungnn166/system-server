<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'role_id' => 1,
                'email' => 'trungnn160697@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0396927189'
            ],
            [
                'name' => 'Admin 01',
                'role_id' => 2,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0399129568'
            ],
            [
                'name' => 'Staff 01',
                'role_id' => 3,
                'email' => 'staff@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0399123456'
            ]
        ]);
    }
    
}
