<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        device::factory()->times(3)->create();
    }
}
