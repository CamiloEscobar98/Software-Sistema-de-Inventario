<?php

namespace Modules\Inventory\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Inventory\app\Enums\ProductMovementTypeEnum;

class ProductMovementTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Inventory\app\Models\ProductMovementType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            ProductMovementTypeEnum::Name => [
                'es' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            ProductMovementTypeEnum::IsEntry => $this->faker->boolean()
        ];
    }
}
