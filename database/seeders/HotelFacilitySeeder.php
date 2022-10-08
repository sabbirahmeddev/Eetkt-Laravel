<?php

namespace Database\Seeders;

use App\Models\HotelFacility;
use Illuminate\Database\Seeder;

class HotelFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HotelFacility::factory()
            ->count(5)
            ->create();
    }
}
