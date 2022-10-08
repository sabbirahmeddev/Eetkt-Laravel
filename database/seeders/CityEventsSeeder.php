<?php

namespace Database\Seeders;

use App\Models\CityEvents;
use Illuminate\Database\Seeder;

class CityEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityEvents::factory()
            ->count(5)
            ->create();
    }
}
