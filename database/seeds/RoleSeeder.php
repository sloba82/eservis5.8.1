<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $roles = [
            'admin',
            'user',
            'serviceman'
        ];

        foreach ($roles as $role) {
            DB::table('users_roles')->insert([
                'name' => $role,
                'created_at' => '2018-02-18 01:20:44',
                'updated_at' => '2018-02-18 01:20:44',

            ]);
        }

    }
}
