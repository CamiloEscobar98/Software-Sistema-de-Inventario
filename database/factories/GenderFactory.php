<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Enums\GenderEnum;

use App\Models\Gender;

/**
 * class GenderFactory
 * 
 * @package Database\Factories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Gender $model
 * 
 * @method array definition
 */
class GenderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Gender::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            GenderEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            GenderEnum::Slug => Str::upper(Str::random(GenderEnum::SlugCount)),
        ];
    }
}
