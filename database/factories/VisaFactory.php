<?php

namespace Database\Factories;

use App\Models\Visa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => \App\Models\Country::factory(),
        ];
    }
}
