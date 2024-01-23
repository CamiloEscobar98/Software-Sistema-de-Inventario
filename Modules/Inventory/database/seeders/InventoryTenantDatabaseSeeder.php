<?php

namespace Modules\Inventory\database\seeders;

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
        ]);
    }
}
