<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\GenderRepository;

use App\Enums\GenderEnum;

use App\Factories\GenderFactory;

/**
 * Class GenderSeeder
 * @package Database\Seeders
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
            $genders = GenderEnum::DefaultData;
            $total = count($genders);

            $this->command->getOutput()->progressStart($total);
            foreach ($genders as $index => $data) {
                if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->genderRepository->create(GenderFactory::create($data[GenderEnum::Name], $data[GenderEnum::Slug]));
                $this->info(__("seeders.genders.item", ['index' => $index + 1, 'name' => $item->{GenderEnum::Name}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.genders.finish", ['total' => $total]));
        }
    }
}
