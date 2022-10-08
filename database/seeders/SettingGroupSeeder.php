<?php

namespace Database\Seeders;

use App\Models\SettingGroup;
use Illuminate\Database\Seeder;

class SettingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingGroup::factory()
            ->count(5)
            ->create();
    }
}
