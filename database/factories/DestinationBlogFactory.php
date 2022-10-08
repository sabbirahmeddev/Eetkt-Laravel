<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DestinationBlog;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationBlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DestinationBlog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'tags' => $this->faker->text(255),
            'status' => $this->faker->numberBetween(0, 127),
            'city_id' => \App\Models\City::factory(),
        ];
    }
}
