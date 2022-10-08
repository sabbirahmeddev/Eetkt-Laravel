<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->text(255),
            'hotel_type_id' => \App\Models\HotelType::factory(),
        ];
    }
}
