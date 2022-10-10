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
        $this->call(AccountSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(NumberSeeder::class);
        $this->call(RightSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(DeviceTypeSeeder::class);
        $this->call(RuleSeeder::class);
        $this->call(DeviceDetailSeeder::class);


    }
}
