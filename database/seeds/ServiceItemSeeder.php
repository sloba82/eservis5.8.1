<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceItemSeeder extends Seeder
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
            DB::table('service_items')->insert([
                'service_id' => 1,
                'desc'       => $item,
                'pieces'     => rand(1, 10),
                'piece_price'=> rand(1, 20),
                'pdv'        => 20,
                'total'      => 2000,
                'created_at' => '2018-02-18 01:20:44',
                'updated_at' => '2018-02-18 01:20:44',
            ]);
        }

    }
}
