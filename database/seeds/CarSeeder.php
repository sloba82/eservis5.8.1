<?php

use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         for ($x = 0; $x <= 5; $x++) {
             DB::table('cars')->insert([
                 'numberplate' => 'NS'.$x.'JT',
                 'make' => 'vw',
                 'model' => 'Golf',
                 'engine' => '1.6',
                 'year' => '2006',
                 'mileage' => '125000',
                 'created_at' => '2018-02-18 01:20:44',
                 'updated_at' => '2018-02-18 01:20:44',

             ]);
         }

    }
}
