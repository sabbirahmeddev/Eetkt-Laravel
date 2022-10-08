<?php

namespace Database\Factories;

use App\Models\CityEvent;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CityEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'event_type_id' => \App\Models\EventType::factory(),
            'city_id' => \App\Models\City::factory(),
        ];
    }
}
