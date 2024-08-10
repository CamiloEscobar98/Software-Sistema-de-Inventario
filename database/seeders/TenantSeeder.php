<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\TenantRepository;
use App\Repositories\TenantInformationRepository;
use App\Repositories\CityRepository;

use App\Enums\TenantInformationEnum;
use App\Enums\TenantEnum;
use App\Enums\CityEnum;

/**
 * Class TenantSeeder
 * @package Database\Seeders
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property TenantRepository $tenantRepository
 * @property TenantInformationRepository $tenantInformationRepository
 * @property CityRepository $cityRepository
 * 
 * @method void run
 */
class TenantSeeder extends Seeder
{
    use InteractsWithIO;

    protected $tenantRepository;
    protected $tenantInformationRepository;
    protected $cityRepository;

    public function __construct(
        TenantRepository $tenantRepository,
        TenantInformationRepository $tenantInformationRepository,
        CityRepository $cityRepository
    ) {
        $this->output = new ConsoleOutput();

        $this->tenantRepository = $tenantRepository;
        $this->tenantInformationRepository = $tenantInformationRepository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $tenantEnum = (int) $this->command->ask(__("seeders.tenants.ask"), 5);
            $tenantEnum = !is_numeric($tenantEnum) || $tenantEnum <= 0 ? 5 : $tenantEnum;
            $tenants = $this->tenantRepository->makeModels($tenantEnum);

            $cities = $this->cityRepository->all([CityEnum::Id]);

            $this->command->getOutput()->progressStart($tenantEnum);
            foreach ($tenants as $index => $item) {
                $tenantInfo = $this->tenantInformationRepository->makeOneModel([TenantInformationEnum::Id => $item->{TenantEnum::Id}]);
                $tenantInfo->{TenantInformationEnum::CityId} = $cities->random(1)->first()->{CityEnum::Id};

                $item->save();
                $tenantInfo->save();
                if (seedersHasTimer()) if (config('app.seeders_has_timer')) sleep(1);
                $this->info(__("seeders.tenants.item", ['index' => $index + 1, 'name' => $tenantInfo->{TenantInformationEnum::Name}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.tenants.finish", ['total' => $tenantEnum]));
        }
    }
}
