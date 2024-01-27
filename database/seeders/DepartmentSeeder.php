<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;
use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\CountryRepository;
use App\Repositories\DepartmentRepository;

use App\Enums\DepartmentEnum;
use App\Enums\CountryEnum;

/**
 * Class DepartmentSeeder
 * @package Database\Seeders
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

            $departmentTotal = (int) $this->command->ask(__("seeders.departments.ask"), 5);
            $departmentTotal = !is_numeric($departmentTotal) || $departmentTotal <= 0 ? 5 : $departmentTotal;
            $departments = $this->departmentRepository->makeModels($departmentTotal);

            $countries = $this->countryRepository->all([CountryEnum::Id]);

            $this->command->getOutput()->progressStart($departmentTotal);
            foreach ($departments as $index => $item) {
                if (config('app.seeders_has_timer')) sleep(1);
                $this->info(__("seeders.departments.item", ['index' => $index + 1, 'name' => $item->{DepartmentEnum::Name}]));
                $item->{DepartmentEnum::CountryId} = $countries->random(1)->first()->{CountryEnum::Id};
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.departments.finish", ['total' => $departmentTotal]));
        }
    }
}
