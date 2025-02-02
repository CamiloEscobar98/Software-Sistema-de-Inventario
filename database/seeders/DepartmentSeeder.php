<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\CountryRepository;
use App\Repositories\DepartmentRepository;

use App\Services\FileDataReader;

use App\Enums\DepartmentEnum;
use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;
use App\Factories\DepartmentFactory;

/**
 * Class DepartmentSeeder
 * @package Database\Seeders
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property DepartmentRepository $departmentRepository
 * @property CountryRepository $departmentRepository
 * 
 * @method void run
 */
class DepartmentSeeder extends Seeder
{
    use InteractsWithIO;

    protected $departmentRepository;
    protected $countryRepository;

    public function __construct(DepartmentRepository $departmentRepository, CountryRepository $countryRepository)
    {
        $this->output = new ConsoleOutput();

        $this->departmentRepository = $departmentRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $departments = FileDataReader::readFileFromCsv('jsondata/states.csv');
            $total = count($departments);

            $countries = $this->countryRepository->all([CountryEnum::ID]);

            $this->command->getOutput()->progressStart($total);
            foreach ($departments as $index => $data) {
                if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->departmentRepository->create(DepartmentFactory::create(
                    $data[DepartmentEnum::ID],
                    $data[DepartmentEnum::CountryId],
                    [LanguageEnum::LANG_ES => $data[DepartmentEnum::NAME]]
                ));
                $this->info(__("seeders.departments.item", ['index' => $index + 1, 'name' => $item->{DepartmentEnum::NAME}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.departments.finish", ['total' => $total]));
        }
    }
}
