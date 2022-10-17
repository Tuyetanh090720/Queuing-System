<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rightDetail;


class RightDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rightDetail::factory()->times(3)->create();

    }
}
