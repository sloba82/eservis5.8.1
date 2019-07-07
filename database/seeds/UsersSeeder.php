<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'address' => 'Petra Petrovica 6',
            'city' => 'Novi Sad',
            'phone' => '0642465848',
            'role' => 1,
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);

        DB::table('users')->insert([

            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test'),
            'address' => 'Petra Petrovica 6',
            'city' => 'Novi Sad',
            'phone' => '0642465848',
            'role' => 1,
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);
    }
}

