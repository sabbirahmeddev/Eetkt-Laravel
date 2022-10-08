<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

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
            'job_category_id' => \App\Models\JobCategory::factory(),
            'job_sub_category_id' => \App\Models\JobSubCategory::factory(),
        ];
    }
}
