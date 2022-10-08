<?php

namespace Database\Seeders;

use App\Models\JobSubCategory;
use Illuminate\Database\Seeder;

class JobSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobSubCategory::factory()
            ->count(5)
            ->create();
    }
}
