<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Setting\app\Enums\CountryEnum;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Setting\app\Models\Country::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            CountryEnum::Name => $this->faker->country,
            CountryEnum::Slug => $this->faker->word
        ];
    }
}
