<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\rule;


class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        rule::factory()->times(3)->create();
    }
}
