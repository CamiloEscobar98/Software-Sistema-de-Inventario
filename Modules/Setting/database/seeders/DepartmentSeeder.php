<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;
use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Repositories\CountryRepository;
use Modules\Setting\app\Repositories\DepartmentRepository;

use Modules\Setting\app\Enums\DepartmentEnum;
use Modules\Setting\app\Enums\CountryEnum;

/**
 * Class DepartmentSeeder
 * @package Modules\Setting\database\seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
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

            $departmentTotal = (int) $this->command->ask(__("setting::seeders.departments.ask"), 5);
            $departmentTotal = !is_numeric($departmentTotal) || $departmentTotal <= 0 ? 5 : $departmentTotal;
            $departments = $this->departmentRepository->makeModels($departmentTotal);

            $countries = $this->countryRepository->all([CountryEnum::Id]);

            $this->command->getOutput()->progressStart($departmentTotal);
            foreach ($departments as $index => $item) {
                sleep(1);
                $this->info(__("setting::seeders.departments.item", ['index' => $index + 1, 'name' => $item->{DepartmentEnum::Name}]));
                $item->{DepartmentEnum::CountryId} = $countries->random(1)->first()->{CountryEnum::Id};
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.departments.finish", ['total' => $departmentTotal]));
        }
    }
}
