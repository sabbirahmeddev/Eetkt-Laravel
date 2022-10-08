<?php

namespace Database\Seeders;

use App\Models\CityCategory;
use Illuminate\Database\Seeder;

class CityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityCategory::factory()
            ->count(5)
            ->create();
    }
}
