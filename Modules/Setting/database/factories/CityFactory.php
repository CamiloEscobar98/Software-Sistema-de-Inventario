<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Setting\app\Enums\CityEnum;

use Modules\Setting\app\Models\City;

/**
 * class CityFactory
 * 
 * @package Modules\Setting\database\factories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property City $model
 * 
 * @method array definition
 */
class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            CityEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            CityEnum::Slug => Str::upper(Str::random(15)),
        ];
    }
}
