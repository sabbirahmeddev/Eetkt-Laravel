<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(BlogSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SettingGroupSeeder::class);
        $this->call(SocialLinkSeeder::class);
        $this->call(UserSeeder::class);
    }
}
