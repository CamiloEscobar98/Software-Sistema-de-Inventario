<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\CityRepository;
use App\Repositories\DepartmentRepository;

use App\Enums\CityEnum;
use App\Enums\DepartmentEnum;
use App\Enums\LanguageEnum;
use App\Factories\CityFactory;
use App\Services\FileDataReader;

/**
 * Class CitySeeder
 * @package Database\Seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property CityRepository $cityRepository
 * @property DepartmentRepository $departmentRepository
 * 
 * @method void run
 */
class CitySeeder extends Seeder
{
    use InteractsWithIO;

    protected $cityRepository;
    protected $departmentRepository;

    public function __construct(CityRepository $cityRepository, DepartmentRepository $departmentRepository)
    {
        $this->output = new ConsoleOutput();

        $this->cityRepository = $cityRepository;
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $cities = FileDataReader::readFileFromCsv('jsondata/cities.csv');
            $total = count($cities);

            $this->command->getOutput()->progressStart($total);
            foreach ($cities as $index => $data) {
                if (config('app.seeders_has_timer')) if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->cityRepository->create(CityFactory::create(
                    $data[CityEnum::Id],
                    $data[CityEnum::DepartmentId],
                    [LanguageEnum::LANG_ES => $data[CityEnum::Name]]
                ));
                $this->info(__("seeders.cities.item", ['index' => $index + 1, 'name' => $item->{CityEnum::Name}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.cities.finish", ['total' => $total]));
        }
    }
}
