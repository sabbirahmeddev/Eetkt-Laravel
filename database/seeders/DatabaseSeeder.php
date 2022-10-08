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
        $this->call(BusSeeder::class);
        $this->call(BusRouteSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(CarBrandSeeder::class);
        $this->call(CarDriverSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CityCategorySeeder::class);
        $this->call(CityEventsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DestinationBlogSeeder::class);
        $this->call(EventTypeSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(HolidaySeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(HotelFacilitySeeder::class);
        $this->call(HotelServiceSeeder::class);
        $this->call(HotelTypeSeeder::class);
        $this->call(InsuranceSeeder::class);
        $this->call(InsuranceAgencySeeder::class);
        $this->call(JobSeeder::class);
        $this->call(JobCategorySeeder::class);
        $this->call(JobSubCategorySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SettingGroupSeeder::class);
        $this->call(SocialLinkSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VisaSeeder::class);
    }
}
