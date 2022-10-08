<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HotelFacility;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFacilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HotelFacility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'hotel_id' => \App\Models\Hotel::factory(),
        ];
    }
}
