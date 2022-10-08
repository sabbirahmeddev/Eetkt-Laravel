<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->randomNumber,
            'video' => $this->faker->text(255),
            'seat_count' => $this->faker->randomNumber(0),
            'cost' => $this->faker->randomNumber(1),
            'car_brand_id' => \App\Models\CarBrand::factory(),
            'car_driver_id' => \App\Models\CarDriver::factory(),
        ];
    }
}
