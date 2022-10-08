<?php

namespace Database\Factories;

use App\Models\CarDriver;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarDriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CarDriver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}