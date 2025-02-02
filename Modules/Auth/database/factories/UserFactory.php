<?php

namespace Modules\Auth\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Modules\Auth\app\Enums\UserEnum;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Auth\app\Models\User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            UserEnum::EMAIL => $this->faker->unique(true)->safeEmail(),
            UserEnum::PASSWORD => Hash::make('password'),
            UserEnum::REMEMBER_TOKEN => Str::random(10),
            UserEnum::EMAIL_VERIFIED_AT => now(),
        ];
    }
}
