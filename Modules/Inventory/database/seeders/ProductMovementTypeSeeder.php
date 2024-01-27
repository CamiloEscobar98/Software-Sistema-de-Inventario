<?php

namespace Modules\Inventory\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Inventory\app\Repositories\ProductMovementTypeRepository;

use Modules\Inventory\app\Enums\ProductMovementTypeEnum;

class ProductMovementTypeSeeder extends Seeder
{
    use InteractsWithIO;

    protected $productMovementTypeRepository;

    public function __construct(ProductMovementTypeRepository $productMovementTypeRepository)
    {
        $this->output = new ConsoleOutput();

        $this->productMovementTypeRepository = $productMovementTypeRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $productMovementTypeTotal = (int) $this->command->ask(__("inventory::seeders.product_movement_types.ask"), 5);
            $productMovementTypeTotal = !is_numeric($productMovementTypeTotal) || $productMovementTypeTotal <= 0 ? 5 : $productMovementTypeTotal;
            $product_movement_types = $this->productMovementTypeRepository->makeModels($productMovementTypeTotal);

            $this->command->getOutput()->progressStart($productMovementTypeTotal);
            foreach ($product_movement_types as $index => $item) {
                if (seedersHasTimer()) if (config('app.seeders_has_timer')) sleep(1);

                $this->info(__("inventory::seeders.product_movement_types.item", ['index' => $index + 1, 'name' => $item->{ProductMovementTypeEnum::Name}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("inventory::seeders.product_movement_types.finish", ['total' => $productMovementTypeTotal]));
        }
    }
}
