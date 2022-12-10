<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiceSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DeviceTypeSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(DeviceDetailSeeder::class);
        $this->call(RightSeeder::class);
        $this->call(RightFunctionSeeder::class);
        $this->call(RightDetailSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(NumberSeeder::class);
    }
}
