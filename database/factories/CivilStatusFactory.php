<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Enums\CivilStatusEnum;

use App\Models\CivilStatus;

/**
 * class CivilStatusFactory
 * 
 * @package Database\Factories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property CivilStatus $model
 * 
 * @method array definition
 */
class CivilStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = CivilStatus::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            CivilStatusEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            CivilStatusEnum::Slug =>  Str::upper(Str::random(15)),
        ];
    }
}
