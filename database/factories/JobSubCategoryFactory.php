<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\JobSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobSubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobSubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
