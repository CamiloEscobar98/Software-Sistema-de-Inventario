<?php

namespace Modules\Inventory\database\seeders;

use App\Enums\LanguageEnum;
use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Inventory\app\Repositories\ProductMovementTypeRepository;

use Modules\Inventory\app\Enums\ProductMovementTypeEnum;

class ProductMovementTypeSeeder extends Seeder
{
    use InteractsWithIO;

    protected $productMovementTypeRepository;

    private const ProductInputTextEN = 'Product Input';
    private const ProductInputTextES = 'Entrada de Productos';

    private const ProductOutputTextEN = 'Product Output';
    private const ProductOutputTextES = 'Salida de Productos';

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
            $product_movement_types = self::getDefaultData();
            $productMovementTypeTotal = (int) count($product_movement_types);

            $this->command->getOutput()->progressStart($productMovementTypeTotal);
            foreach ($product_movement_types as $index => $itemData) {
                if (seedersHasTimer()) if (config('app.seeders_has_timer')) sleep(1);

                $item = $this->productMovementTypeRepository->create($itemData);

                $this->info(__("inventory::seeders.product_movement_types.item", ['index' => $index + 1, 'name' => $item->{ProductMovementTypeEnum::Name}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("inventory::seeders.product_movement_types.finish", ['total' => $productMovementTypeTotal]));
        }
    }

    /**
     * Get the Default Data
     * 
     * @return array
     */
    private static function getDefaultData(): array
    {
        return [
            [
                ProductMovementTypeEnum::Id => ProductMovementTypeEnum::ProductInputId,
                ProductMovementTypeEnum::Name => [LanguageEnum::LANG_EN => self::ProductInputTextEN, LanguageEnum::LANG_ES => self::ProductInputTextES],
                ProductMovementTypeEnum::IsEntry => true,
            ],
            [
                ProductMovementTypeEnum::Id => ProductMovementTypeEnum::ProductOutputId,
                ProductMovementTypeEnum::Name => [LanguageEnum::LANG_EN => self::ProductOutputTextEN, LanguageEnum::LANG_ES => self::ProductOutputTextES],
                ProductMovementTypeEnum::IsEntry => true,
            ]
        ];
    }
}
