<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Setting\app\Enums\GenderEnum;

class GenderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Setting\app\Models\Gender::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            GenderEnum::Name => $this->faker->unique()->word,
            GenderEnum::Slug => $this->faker->unique()->word
        ];
    }
}
