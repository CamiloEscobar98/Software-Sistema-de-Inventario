<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Modules\Inventory\database\seeders\InventoryTenantDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([InventoryTenantDatabaseSeeder::class]);
    }
}
