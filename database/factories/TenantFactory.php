<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Tenant;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $id = $this->faker->word();
        return [
            'id' => $id,
            'url' => "http://inventix.test/$id",
            'host' => 'localhost',
            'port' => '3306',
        ];
    }
}
