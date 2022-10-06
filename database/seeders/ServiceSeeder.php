<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        service::factory()->times(3)->create();
    }
}
