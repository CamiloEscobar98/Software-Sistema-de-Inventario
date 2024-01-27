<?php

namespace Modules\Inventory\Database\Seeders;

use Illuminate\Database\Seeder;

class InventoryTenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductMovementTypeSeeder::class,
        ]);
    }
}
