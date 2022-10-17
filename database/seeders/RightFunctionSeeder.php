<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rightFunction;

class RightFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rightFunction::factory()->times(3)->create();
    }
}
