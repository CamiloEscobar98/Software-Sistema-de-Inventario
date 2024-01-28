<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enums\UserDocumentEnum;

class UserDocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Auth\app\Models\UserDocument::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            UserDocumentEnum::Document => $this->faker->numerify('##########')
        ];
    }
}

