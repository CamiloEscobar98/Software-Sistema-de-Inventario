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
        return [
            ProductEnum::Name => $this->faker->sentence(3),
            ProductEnum::Info => $this->faker->paragraph(3),
            ProductEnum::Price => $this->faker->randomFloat(3, 1, 5000),
            ProductEnum::SkuCode => Str::upper(Str::random(10)),
            ProductEnum::CurrentStock => 0,
            ProductEnum::MinimumStock => 0,
        ];
    }
}
