<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\CivilStatusRepository;

use App\Enums\CivilStatusEnum;
use App\Factories\CivilStatusFactory;

/**
 * Class CivilStatusSeeder
 * @package Database\Seeders
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
            $civil_statuses = CivilStatusEnum::DefaultData;
            $total = count($civil_statuses);

            $this->command->getOutput()->progressStart($total);
            foreach ($civil_statuses as $index => $data) {
                if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->civilStatusRepository->create(CivilStatusFactory::create($data[CivilStatusEnum::Name], $data[CivilStatusEnum::Slug]));
                $this->info(__("seeders.civil_statuses.item", ['index' => $index + 1, 'name' => $item->{CivilStatusEnum::Name}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.civil_statuses.finish", ['total' => $total]));
        }
    }
}
