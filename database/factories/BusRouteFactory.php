<?php

namespace Database\Factories;

use App\Models\BusRoute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusRouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusRoute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_time' => $this->faker->dateTime,
            'end_time' => $this->faker->dateTime('now', 'UTC'),
            'seat_cost' => $this->faker->randomNumber(1),
            'bus_id' => \App\Models\Bus::factory(),
            'to' => \App\Models\City::factory(),
            'from' => \App\Models\City::factory(),
        ];
    }
}
