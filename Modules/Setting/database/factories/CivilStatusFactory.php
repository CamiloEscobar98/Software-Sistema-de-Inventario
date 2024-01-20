<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Setting\app\Enums\CivilStatusEnum;

class CivilStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Setting\app\Models\CivilStatus::class;

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

