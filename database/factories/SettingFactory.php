<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property' => $this->faker->text(255),
            'value' => $this->faker->text(255),
            'type' => $this->faker->text(255),
            'setting_group_id' => \App\Models\SettingGroup::factory(),
        ];
    }
}
