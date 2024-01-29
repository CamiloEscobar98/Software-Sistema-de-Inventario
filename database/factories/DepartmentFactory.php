<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Enums\DepartmentEnum;

use App\Models\Department;

/**
 * class DepartmentFactory
 * 
 * @package Database\Factories
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
            DepartmentEnum::Slug => Str::upper(Str::random(DepartmentEnum::SlugCount)),
        ];
    }
}
