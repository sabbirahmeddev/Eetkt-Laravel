<?php

namespace Database\Seeders;

use App\Models\CarDriver;
use Illuminate\Database\Seeder;

class CarDriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarDriver::factory()
            ->count(5)
            ->create();
    }
}
