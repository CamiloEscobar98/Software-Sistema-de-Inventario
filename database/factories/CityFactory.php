<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Enums\CityEnum;

use App\Models\City;

/**
 * class CityFactory
 * 
 * @package Database\Factories
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
            CityEnum::Slug => Str::upper(Str::random(CityEnum::SlugCount)),
        ];
    }
}
