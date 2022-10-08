<?php

namespace Database\Factories;

use App\Models\Holiday;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HolidayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Holiday::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'cost' => $this->faker->randomNumber(1),
            'city_id' => \App\Models\City::factory(),
        ];
    }
}
