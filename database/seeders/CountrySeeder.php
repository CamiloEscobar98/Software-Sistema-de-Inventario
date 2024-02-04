<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\CountryRepository;

use App\Enums\CountryEnum;
use App\Enums\LanguageEnum;
use App\Factories\CountryFactory;
use App\Services\FileDataReader;
use Illuminate\Support\Facades\Log;

/**
 * Class CountrySeeder
 * @package Database\Seeders
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
            $countries = FileDataReader::readFileFromCsv('jsondata/countries.csv');
            $total = count($countries);

            $this->command->getOutput()->progressStart($total);
            foreach ($countries as $index => $data) {
                Log::info($data);
                if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->countryRepository->create(CountryFactory::create(
                    $data[CountryEnum::Id],
                    [LanguageEnum::LANG_ES => $data[CountryEnum::Name]],
                    $data[CountryEnum::Slug]

                ));
                $this->info(__("seeders.countries.item", ['index' => $index + 1, 'name' => $item->{CountryEnum::Name}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.countries.finish", ['total' => $total]));
        }
    }
}
