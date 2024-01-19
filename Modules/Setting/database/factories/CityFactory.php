<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Setting\app\Enums\CityEnum;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Setting\app\Models\City::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            CityEnum::Name => $this->faker->unique()->word,
            CityEnum::Slug => $this->faker->unique()->word,
        ];
    }
}

