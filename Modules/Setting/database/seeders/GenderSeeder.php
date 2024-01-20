<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Models\Gender;

/**
 * Class GenderSeeder
 * @package Modules\Setting\database\seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property CountryRepository $countryRepository
 * 
 * @method void run
 */
class GenderSeeder extends Seeder
{
    use InteractsWithIO;

    public function __construct()
    {
        $this->output = new ConsoleOutput();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $genderEnum = (int) $this->command->ask(__("setting::seeders.genders.ask"), 5);
            $genderEnum = !is_numeric($genderEnum) || $genderEnum <= 0 ? 5 : $genderEnum;
            $genders = Gender::factory($genderEnum)->make();

            $this->command->getOutput()->progressStart($genderEnum);
            foreach ($genders as $index => $item) {
                sleep(1);
                $this->info(__("setting::seeders.genders.item", ['index' => $index + 1, 'name' => $item->name]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.genders.finish", ['total' => $genderEnum]));
        }
    }
}
