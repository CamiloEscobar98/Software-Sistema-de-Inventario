<?php

namespace Database\Seeders;

use App\Enums\LanguageEnum;
use App\Factories\LanguageFactory;
use Illuminate\Database\Seeder;
use Illuminate\Console\Concerns\InteractsWithIO;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\LanguageRepository;

class LanguageSeeder extends Seeder
{
    use InteractsWithIO;

    protected $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->output = new ConsoleOutput();

        $this->languageRepository = $languageRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $languages = LanguageEnum::DefaultData;
            $total = count($languages);

            $this->command->getOutput()->progressStart($total);
            foreach ($languages as $index => $data) {
                if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->languageRepository->create(LanguageFactory::create($data[LanguageEnum::Name], $data[LanguageEnum::Slug]));
                $this->info(__("seeders.languages.item", ['index' => $index + 1, 'name' => $item->{LanguageEnum::Name}, 'slug' => $item->{LanguageEnum::Slug}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.languages.finish", ['total' => $total]));
        }
    }
}
