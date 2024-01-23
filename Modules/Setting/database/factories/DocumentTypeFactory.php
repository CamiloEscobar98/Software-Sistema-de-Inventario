<?php

namespace Modules\Setting\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Modules\Setting\app\Enums\DocumentTypeEnum;

use Modules\Setting\app\Models\DocumentType;

/**
 * class DocumentTypeFactory
 * 
 * @package Modules\Setting\database\factories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property DocumentType $model
 * 
 * @method array definition
 */
class DocumentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = DocumentType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            DocumentTypeEnum::Name => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            DocumentTypeEnum::Slug => Str::upper(Str::random(15)),
        ];
    }
}
