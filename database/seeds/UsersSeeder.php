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
            'last_name' => 'adminLastName',
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
            'last_name' => 'adminLastName',
            'password' => bcrypt('Sloba82Dragana84'),
            'address' => 'Petra Petrovica 6',
            'city' => 'Novi Sad',
            'phone' => '0642465848',
            'role' => 1,
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);

        for ($x = 0; $x <= 10; $x++) {
            DB::table('users')->insert([
                'name' => 'test'. $x,
                'email' => $x.'test@gmail.com',
                'last_name' => 'adminLastName',
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
}

