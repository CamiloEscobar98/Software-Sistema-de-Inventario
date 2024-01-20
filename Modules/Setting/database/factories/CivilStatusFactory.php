<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            CivilStatusEnum::Name => $this->faker->unique()->word,
            CivilStatusEnum::Slug => $this->faker->unique()->word
        ];
    }
}
