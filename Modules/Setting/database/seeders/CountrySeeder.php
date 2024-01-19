<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Models\Country;
use Modules\Setting\app\Repositories\CountryRepository;


/**
 * Class CountrySeeder
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
        $this->countryRepository = $countryRepository;
        $this->output = new ConsoleOutput();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $countryNum = (int) $this->command->ask("");
        }

        Country::factory(rand(5, 20))->create();
    }
}
