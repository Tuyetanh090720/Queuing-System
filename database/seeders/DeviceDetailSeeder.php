<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\deviceDetail;


class DeviceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        deviceDetail::factory()->times(3)->create();
    }
}
