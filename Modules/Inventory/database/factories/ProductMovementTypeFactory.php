<?php

namespace Modules\Inventory\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => ''
        ];
    }
}
