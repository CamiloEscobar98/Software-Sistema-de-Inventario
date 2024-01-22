<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            CityEnum::Name => $this->faker->sentence(3),
            CityEnum::Slug => $this->faker->word() . "-" . $this->faker->word()
        ];
    }
}

