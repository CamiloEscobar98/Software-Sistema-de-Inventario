<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Setting\app\Enums\CivilStatusEnum;

use Modules\Setting\app\Models\CivilStatus;

/**
 * class CivilStatusFactory
 * 
 * @package Modules\Setting\database\factories
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
