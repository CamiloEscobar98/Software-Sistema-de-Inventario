<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Repositories\CountryRepository;
use Modules\Setting\app\Repositories\DepartmentRepository;

use Modules\Setting\app\Models\Department;

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
            $countries = $this->countryRepository->all(['id']);
            
            $departmentEnum = (int) $this->command->ask(__("setting::seeders.departments.ask"), 5);
            $departmentEnum = !is_numeric($departmentEnum) || $departmentEnum <= 0 ? 5 : $departmentEnum;
            $departments = Department::factory($departmentEnum)->make();

            $this->command->getOutput()->progressStart($departmentEnum);
            foreach ($departments as $index => $item) {
                sleep(1);
                $this->info(__("setting::seeders.departments.item", ['index' => $index + 1, 'name' => $item->name]));
                $item->country_id = $countries->random(1)->first()->id;
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.departments.finish", ['total' => $departmentEnum]));
        }
    }
}
