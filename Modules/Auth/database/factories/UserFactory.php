<?php

namespace Modules\Auth\Database\Factories;

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
            UserEnum::Email => $this->faker->unique(true)->safeEmail(),
            UserEnum::Password => Hash::make('password'),
            UserEnum::RememberToken => Str::random(10),
            UserEnum::EmailVerifiedAt => now(),
        ];
    }
}
