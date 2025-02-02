<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\UserPersonalInformation;

use App\Enums\UserPersonalInformationEnum;

class UserPersonalInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = UserPersonalInformation::class;

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
