<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\deviceType;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        deviceType::factory()->times(3)->create();
    }
}
