<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($x = 0; $x <= 9; $x++) {
            DB::table('appoitments')->insert([

                'user_id' =>1,
                'name' => 'test'. $x,
                'last_name' => 'last test',
                'email' =>'test@test.com',
                'phone' => '123456',
                'veh_make' =>'bmw',
                'appoitment' =>'2018-02-18 01:20:44',
                'description' =>'desc',
                'comment_admin' =>'coment',
                'active' =>1,
                'confirm' =>0,
                'created_at' => '2018-02-18 01:20:44',
                'updated_at' => '2018-02-18 01:20:44',
            ]);
        }
    }
}
