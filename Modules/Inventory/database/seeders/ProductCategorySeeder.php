<?php

namespace Modules\Inventory\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Inventory\app\Repositories\ProductCategoryRepository;

use Modules\Inventory\app\Enums\ProductCategoryEnum;

/**
 * Class ProductCategorySeeder
 * @package Modules\Inventory\database\seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property ProductCategoryRepository $productCategoryRepository
 * 
 * @method void run
 */
class ProductCategorySeeder extends Seeder
{
    use InteractsWithIO;

    protected $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->output = new ConsoleOutput();

        $this->productCategoryRepository = $productCategoryRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $productCategoriesTotal = (int) $this->command->ask(__("inventory::seeders.product_categories.ask"), 5);
            $productCategoriesTotal = !is_numeric($productCategoriesTotal) || $productCategoriesTotal <= 0 ? 5 : $productCategoriesTotal;
            $product_categories = $this->productCategoryRepository->makeModels($productCategoriesTotal);

            $this->command->getOutput()->progressStart($productCategoriesTotal);
            foreach ($product_categories as $index => $item) {
                $productCategories = $this->productCategoryRepository->all([ProductCategoryEnum::Id]);
                $productCategoryRandom = null;
                if (seedersHasTimer()) if (config('app.seeders_has_timer')) sleep(1);

                if ($productCategories->count() > 0) {
                    $productCategoryRandom = $productCategories->random(1)->first();
                    $item->{ProductCategoryEnum::ProductCategoryId} = $productCategoryRandom->{ProductCategoryEnum::Id};
                }

                $this->info(__("inventory::seeders.product_categories.item", ['index' => $index + 1, 'name' => $item->{ProductCategoryEnum::Name}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("inventory::seeders.product_categories.finish", ['total' => $productCategoriesTotal]));
        }
    }
}
