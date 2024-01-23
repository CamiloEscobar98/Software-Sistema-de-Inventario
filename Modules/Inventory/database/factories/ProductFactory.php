<?php

namespace Modules\Inventory\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Inventory\app\Enums\ProductEnum;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Inventory\app\Models\Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $minimumStock = rand(1, 100);
        $currentStock = rand($minimumStock, 200);

        return [
            ProductEnum::Name => [
                'es' => $this->faker->sentence(3),
                'en' => $this->faker->sentence(3),
            ],
            ProductEnum::Info => $this->faker->paragraph(3),
            ProductEnum::Price => $this->faker->randomFloat(1, 1, 1000) * 500,
            ProductEnum::SkuCode => Str::upper(Str::random(10)),
            ProductEnum::CurrentStock => $currentStock,
            ProductEnum::MinimumStock => $minimumStock,
        ];
    }
}
