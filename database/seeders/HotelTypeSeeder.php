<?php

namespace Database\Seeders;

use App\Models\HotelType;
use Illuminate\Database\Seeder;

class HotelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HotelType::factory()
            ->count(5)
            ->create();
    }
}
