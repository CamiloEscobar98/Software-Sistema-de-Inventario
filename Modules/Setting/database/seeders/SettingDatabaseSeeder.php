<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
