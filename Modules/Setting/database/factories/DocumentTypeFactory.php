<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Setting\app\Enums\DocumentTypeEnum;

class DocumentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Setting\app\Models\DocumentType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            DocumentTypeEnum::Name => $this->faker->unique()->word,
            DocumentTypeEnum::Slug => $this->faker->unique()->word
        ];
    }
}

