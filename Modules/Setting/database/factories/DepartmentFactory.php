<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Setting\app\Enums\DepartmentEnum;

use Modules\Setting\app\Models\Department;

/**
 * class DepartmentFactory
 * 
 * @package Modules\Setting\database\factories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Department $model
 * 
 * @method array definition
 */
class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            DepartmentEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            DepartmentEnum::Slug => Str::upper(Str::random(15)),
        ];
    }
}
