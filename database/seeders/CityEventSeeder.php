<?php

namespace Database\Seeders;

use App\Models\CityEvent;
use Illuminate\Database\Seeder;

class CityEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityEvent::factory()
            ->count(5)
            ->create();
    }
}
