<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Enums\LanguageEnum;

use App\Enums\UserEnum;
use App\Factories\UserAttrsFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            UserEnum::USERNAME => $this->faker->userName(),
            UserEnum::EMAIL => $this->faker->unique(true)->safeEmail(),
            UserEnum::PASSWORD => Hash::make('password'),
            UserEnum::REMEMBER_TOKEN => Str::random(10),
            UserEnum::EMAIL_VERIFIED_AT => now(),
            UserEnum::ATTRS => UserAttrsFactory::buildAttrs(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            UserEnum::EMAIL_VERIFIED_AT => null,
        ]);
    }
}
