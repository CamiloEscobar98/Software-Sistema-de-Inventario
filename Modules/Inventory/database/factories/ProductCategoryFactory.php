<?php

namespace Modules\Inventory\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Inventory\app\Enums\ProductCategoryEnum;

class ProductCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Inventory\app\Models\ProductCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            ProductCategoryEnum::Name => $this->faker->sentence(3),
            ProductCategoryEnum::Info => $this->faker->paragraph(2)
        ];
    }
}
