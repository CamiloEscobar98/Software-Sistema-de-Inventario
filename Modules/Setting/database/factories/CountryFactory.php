<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Setting\app\Enums\CountryEnum;

use Modules\Setting\app\Models\Country;

/**
 * class CountryFactory
 * 
 * @package Modules\Setting\database\factories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Country $model
 * 
 * @method array definition
 */
class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            CountryEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3)
            ],
            CountryEnum::Slug => Str::upper(Str::random(15)),
        ];
    }
}
