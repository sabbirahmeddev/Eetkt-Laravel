<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CityCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CityCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id' => \App\Models\City::factory(),
        ];
    }
}
