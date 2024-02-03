<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,

            CountrySeeder::class,
            DepartmentSeeder::class,
            CitySeeder::class,
            GenderSeeder::class,
            DocumentTypeSeeder::class,
            CivilStatusSeeder::class,

            UserSeeder::class,

            TenantSeeder::class
        ]);
    }
}
