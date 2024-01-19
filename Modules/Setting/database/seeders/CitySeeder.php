<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;
use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Repositories\CityRepository;
use Modules\Setting\app\Repositories\DepartmentRepository;

use Modules\Setting\app\Models\City;

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
            $departments = $this->departmentRepository->all(['id']);

            $cityEnum = (int) $this->command->ask(__("setting::seeders.cities.ask"), 5);
            $cityEnum = !is_numeric($cityEnum) || $cityEnum <= 0 ? 5 : $cityEnum;
            $cities = City::factory($cityEnum)->make();

            $this->command->getOutput()->progressStart($cityEnum);
            foreach ($cities as $index => $item) {
                sleep(1);
                $this->info(__("setting::seeders.cities.item", ['index' => $index + 1, 'name' => $item->name]));
                $item->department_id = $departments->random(1)->first()->id;
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.cities.finish", ['total' => $cityEnum]));
        }
    }
}
