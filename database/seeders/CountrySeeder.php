<?php

namespace Database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\CountryRepository;

use App\Enums\CountryEnum;

/**
 * Class CountrySeeder
 * @package Database\seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property CountryRepository $countryRepository
 * 
 * @method void run
 */
class CountrySeeder extends Seeder
{
    use InteractsWithIO;

    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->output = new ConsoleOutput();

        $this->countryRepository = $countryRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $countryNum = (int) $this->command->ask(__("seeders.countries.ask"), 5);
            $countryNum = !is_numeric($countryNum) || $countryNum <= 0 ? 5 : $countryNum;
            $countries = $this->countryRepository->makeModels($countryNum);

            $this->command->getOutput()->progressStart($countryNum);
            foreach ($countries as $index => $item) {
                sleep(1);
                $this->info(__("seeders.countries.item", ['index' => $index + 1, 'name' => $item->{CountryEnum::Name}]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.countries.finish", ['total' => $countryNum]));
        }
    }
}
