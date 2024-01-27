<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\seeders\CitySeeder;
use Database\seeders\CivilStatusSeeder;
use Database\seeders\CountrySeeder;
use Database\seeders\DepartmentSeeder;
use Database\seeders\DocumentTypeSeeder;
use Database\seeders\GenderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            DepartmentSeeder::class,
            CitySeeder::class,
            GenderSeeder::class,
            DocumentTypeSeeder::class,
            CivilStatusSeeder::class,
        ]);
    }
}
