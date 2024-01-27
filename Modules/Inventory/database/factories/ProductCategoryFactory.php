<?php

namespace Modules\Inventory\Database\Factories;

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
            ProductCategoryEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            ProductCategoryEnum::Info => [
                'en' => $this->faker->paragraph(3),
                'es' => $this->faker->paragraph(3),
            ],
        ];
    }
}
