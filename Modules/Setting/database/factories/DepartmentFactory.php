<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Setting\app\Enums\DepartmentEnum;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Setting\app\Models\Department::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            DepartmentEnum::Name => $this->faker->unique()->word,
            DepartmentEnum::Slug => $this->faker->unique()->word,
        ];
    }
}
