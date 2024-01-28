<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Seeder;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\UserRepository;
use App\Repositories\CivilStatusRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\GenderRepository;
use App\Repositories\UserDocumentRepository;
use App\Repositories\UserPersonalInformationRepository;

use App\Enums\UserEnum;
use App\Enums\UserPersonalInformationEnum;

/**
 * Class UserSeeder
 * @package Database\Seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property UserRepository $userRepository
 * @property UserDocumentRepository $userDocumentRepository
 * @property UserPersonalInformationRepository $userPersonalInformationRepository
 * @property GenderRepository $genderRepository
 * @property DocumentTypeRepository $documentTypeRepository
 * @property CivilStatusRepository $civilStatusRepository
 * 
 * @method void run
 */
class UserSeeder extends Seeder
{
    use InteractsWithIO;

    protected $userRepository;
    protected $userDocumentRepository;
    protected $userPersonalInformationRepository;
    protected $genderRepository;
    protected $documentTypeRepository;
    protected $civilStatusRepository;

    public function __construct(
        UserRepository $userRepository,
        UserDocumentRepository $userDocumentRepository,
        UserPersonalInformationRepository $userPersonalInformationRepository,
        GenderRepository $genderRepository,
        DocumentTypeRepository $documentTypeRepository,
        CivilStatusRepository $civilStatusRepository,
    ) {
        $this->output = new ConsoleOutput();

        $this->userRepository = $userRepository;
        $this->userDocumentRepository = $userDocumentRepository;
        $this->userPersonalInformationRepository = $userPersonalInformationRepository;
        $this->genderRepository = $genderRepository;
        $this->documentTypeRepository = $documentTypeRepository;
        $this->civilStatusRepository = $civilStatusRepository;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $total = (int) $this->command->ask(__("seeders.users.ask"), 5);
            $total = !is_numeric($total) || $total <= 0 ? 5 : $total;
            $users = $this->userRepository->makeModels($total);

            $genders = $this->genderRepository->all(['id']);
            $documentTypes = $this->documentTypeRepository->all(['id']);
            $civilStatuses = $this->civilStatusRepository->all(['id']);

            $this->command->getOutput()->progressStart($total);
            foreach ($users as $index => $item) {
                if (config('app.seeders_has_timer')) sleep(1);
                $this->info(__("seeders.users.item", ['index' => $index + 1, 'name' => $item->{UserEnum::Username}]));
                $item->save();

                $userPersonalInfo = $this->userPersonalInformationRepository->makeOneModel([
                    UserPersonalInformationEnum::Id => $item->id,

                ]);

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.users.finish", ['total' => $total]));
        }
    }
}
