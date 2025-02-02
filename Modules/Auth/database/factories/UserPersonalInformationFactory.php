<?php

namespace Modules\Auth\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Auth\app\Enums\UserPersonalInformationEnum;

class UserPersonalInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Auth\app\Models\UserPersonalInformation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            UserPersonalInformationEnum::NAME => $this->faker->name(),
            UserPersonalInformationEnum::EMAIL => $this->faker->freeEmail(),
            UserPersonalInformationEnum::BIRTHDATE => $this->faker->dateTimeBetween('-50 years', '-32 years'),
        ];
    }
}
