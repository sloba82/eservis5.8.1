<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(CarUserSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(ServicesSeeder::class);
    }
}
