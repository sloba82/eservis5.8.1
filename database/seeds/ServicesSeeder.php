<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $items = [
            'kvar alternatora',
            'zamena filtera',
            'ugradnja alrma',
            'zamena katalizatora'
        ];

        foreach ($items as $item) {
            DB::table('services')->insert([
                'car_id' => 1,
                'user_id'=>1,
                'service_name' =>'7-10-9/53',
                'service_man' => 1,
                'service_status' => 1,
                'kilometer' => '145000',
                'service_date' => '2018-02-18 01:20:44',
                'description' => $item,
                'created_at' => '2018-02-18 01:20:44',
                'updated_at' => '2018-02-18 01:20:44',
            ]);
        }

    }
}
