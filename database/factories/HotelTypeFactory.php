<?php

namespace Database\Factories;

use App\Models\HotelType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HotelType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'star' => $this->faker->randomNumber(0),
        ];
    }
}
