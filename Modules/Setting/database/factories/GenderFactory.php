<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Setting\app\Enums\GenderEnum;

use Modules\Setting\app\Models\Gender;

/**
 * class GenderFactory
 * 
 * @package Modules\Setting\database\factories
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
            GenderEnum::Slug => Str::upper(Str::random(15)),
        ];
    }
}
