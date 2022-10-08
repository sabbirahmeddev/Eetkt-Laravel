<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HotelService;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HotelService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cost' => $this->faker->randomNumber(1),
            'hotel_id' => \App\Models\Hotel::factory(),
        ];
    }
}
