<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\number;


class NumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        number::factory()->times(3)->create();

    }
}
