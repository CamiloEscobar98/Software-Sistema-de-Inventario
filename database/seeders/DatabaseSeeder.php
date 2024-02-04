<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->runFileSQL('sql/locations.sql'); # Replace CountrySeeder, DepartmentSeeder and CitySeeder.

        $this->call([
            LanguageSeeder::class,

            // CountrySeeder::class,
            // DepartmentSeeder::class,
            // CitySeeder::class,
            GenderSeeder::class,
            DocumentTypeSeeder::class,
            CivilStatusSeeder::class,

            UserSeeder::class,

            TenantSeeder::class
        ]);
    }

    private function runFileSQL($file)
    {
        $path = database_path($file);
        $sql = File::get($path);
        DB::unprepared($sql);
    }
}
