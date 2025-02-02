<?php

namespace Modules\Inventory\database\seeders;

use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Seeder;

use Laravel\Prompts\Output\ConsoleOutput;

use Modules\Inventory\app\Repositories\ProductCategoryRepository;
use Modules\Inventory\app\Repositories\ProductRepository;

use Modules\Inventory\app\Enums\ProductCategoryEnum;
use Modules\Inventory\app\Enums\ProductEnum;

/**
 * Class ProductSeeder
 * @package Modules\Inventory\database\seeders
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property ProductCategoryRepository $productCategoryRepository
 * @property ProductRepository $productRepository
 * 
 * @method void run
 */
class ProductSeeder extends Seeder
{
    use InteractsWithIO;

    protected $productCategoryRepository;
    protected $productRepository;

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        ProductRepository $productRepository
    ) {
        $this->output = new ConsoleOutput();

        $this->productCategoryRepository = $productCategoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $productTotal = (int) $this->command->ask(__("inventory::seeders.products.ask"), 5);
            $productTotal = !is_numeric($productTotal) || $productTotal <= 0 ? 5 : $productTotal;
            $products = $this->productRepository->makeModels($productTotal);

            $productCategories = $this->productCategoryRepository->all([ProductCategoryEnum::ID]);

            $this->command->getOutput()->progressStart($productTotal);
            foreach ($products as $index => $item) {
                if (seedersHasTimer()) if (config('app.seeders_has_timer')) sleep(1);
                $item->{ProductEnum::ProductCategoryId} = $productCategories->random(1)->first()->{ProductCategoryEnum::ID};
                $this->info(__("inventory::seeders.products.item", ['index' => $index + 1, 'name' => $item->{ProductCategoryEnum::NAME}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("inventory::seeders.products.finish", ['total' => $productTotal]));
        }
    }
}
