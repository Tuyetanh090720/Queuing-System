<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        account::factory()->times(3)->create();
    }
}
