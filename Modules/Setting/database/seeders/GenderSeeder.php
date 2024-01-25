<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Repositories\GenderRepository;

use Modules\Setting\app\Enums\GenderEnum;

/**
 * Class GenderSeeder
 * @package Modules\Setting\database\seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property GenderRepository $genderRepository
 * 
 * @method void run
 */
class GenderSeeder extends Seeder
{
    use InteractsWithIO;

    protected $genderRepository;

    public function __construct(GenderRepository $genderRepository)
    {
        $this->output = new ConsoleOutput();

        $this->genderRepository = $genderRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $genderTotal = (int) $this->command->ask(__("setting::seeders.genders.ask"), 5);
            $genderTotal = !is_numeric($genderTotal) || $genderTotal <= 0 ? 5 : $genderTotal;
            $genders = $this->genderRepository->makeModels($genderTotal);

            $this->command->getOutput()->progressStart($genderTotal);
            foreach ($genders as $index => $item) {
                if (seedersHasTimer()) sleep(1);
                $this->info(__("setting::seeders.genders.item", ['index' => $index + 1, 'name' => $item->{GenderEnum::Name}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.genders.finish", ['total' => $genderTotal]));
        }
    }
}
