<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('car_users')->insert([
            'car_id' => 1,
            'user_id' => 1,
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);

        DB::table('car_users')->insert([
            'car_id' => 2,
            'user_id' => 1,
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);

        DB::table('car_users')->insert([
            'car_id' => 2,
            'user_id' => 2,
            'created_at' => '2018-02-18 01:20:44',
            'updated_at' => '2018-02-18 01:20:44',
        ]);

    }
}