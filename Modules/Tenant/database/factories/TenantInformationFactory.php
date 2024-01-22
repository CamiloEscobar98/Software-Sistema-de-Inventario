<?php

namespace Modules\Tenant\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\Tenant\app\Enums\TenantInformationEnum;

use Modules\Tenant\app\Models\TenantInformation;

class TenantInformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = TenantInformation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            TenantInformationEnum::Name => "Institución Educativa {$this->faker->words(2, true)}",
            TenantInformationEnum::Slogan => $this->faker->sentence(6, true),
            TenantInformationEnum::Address => $this->faker->address(),
            TenantInformationEnum::Telephone => $this->faker->e164PhoneNumber(),
            TenantInformationEnum::Phone => $this->faker->phoneNumber()
        ];
    }
}
