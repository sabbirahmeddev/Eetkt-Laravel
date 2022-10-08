<?php

namespace Database\Seeders;

use App\Models\Visa;
use Illuminate\Database\Seeder;

class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visa::factory()
            ->count(5)
            ->create();
    }
}
