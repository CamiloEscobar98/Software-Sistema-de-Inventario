<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Repositories\CivilStatusRepository;

use Modules\Setting\app\Enums\CivilStatusEnum;


/**
 * Class CivilStatusSeeder
 * @package Modules\Setting\database\seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property CivilStatusRepository $civilStatusRepository
 * 
 * @method void run
 */
class CivilStatusSeeder extends Seeder
{
    use InteractsWithIO;

    protected $civilStatusRepository;

    public function __construct(CivilStatusRepository $civilStatusRepository)
    {
        $this->output = new ConsoleOutput();

        $this->civilStatusRepository = $civilStatusRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $civilStatusNum = (int) $this->command->ask(__("setting::seeders.civil_statuses.ask"), 5);
            $civilStatusNum = !is_numeric($civilStatusNum) || $civilStatusNum <= 0 ? 5 : $civilStatusNum;
            $civil_statuses = $this->civilStatusRepository->makeModels($civilStatusNum);

            $this->command->getOutput()->progressStart($civilStatusNum);
            foreach ($civil_statuses as $index => $item) {
                sleep(1);
                $this->info(__("setting::seeders.civil_statuses.item", ['index' => $index + 1, 'name' => $item->{CivilStatusEnum::Name}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.civil_statuses.finish", ['total' => $civilStatusNum]));
        }
    }
}
