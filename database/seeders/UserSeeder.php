<?php

namespace Database\Seeders;

use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Seeder;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\UserRepository;
use App\Repositories\CivilStatusRepository;
use App\Repositories\DocumentTypeRepository;
use App\Repositories\GenderRepository;
use App\Repositories\CityRepository;
use App\Repositories\UserDocumentRepository;
use App\Repositories\UserPersonalInformationRepository;

use App\Enums\UserEnum;
use App\Enums\UserPersonalInformationEnum;
use App\Enums\CityEnum;
use App\Enums\CivilStatusEnum;
use App\Enums\DocumentTypeEnum;
use App\Enums\GenderEnum;
use App\Enums\UserDocumentEnum;

/**
 * Class UserSeeder
 * @package Database\Seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property UserRepository $userRepository
 * @property UserDocumentRepository $userDocumentRepository
 * @property UserPersonalInformationRepository $userPersonalInformationRepository
 * @property GenderRepository $genderRepository
 * @property CityRepository $cityRepository
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
    protected $cityRepository;
    protected $documentTypeRepository;
    protected $civilStatusRepository;

    public function __construct(
        UserRepository $userRepository,
        UserDocumentRepository $userDocumentRepository,
        UserPersonalInformationRepository $userPersonalInformationRepository,
        GenderRepository $genderRepository,
        CityRepository $cityRepository,
        DocumentTypeRepository $documentTypeRepository,
        CivilStatusRepository $civilStatusRepository,
    ) {
        $this->output = new ConsoleOutput();

        $this->userRepository = $userRepository;
        $this->userDocumentRepository = $userDocumentRepository;
        $this->userPersonalInformationRepository = $userPersonalInformationRepository;
        $this->genderRepository = $genderRepository;
        $this->cityRepository = $cityRepository;
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
            $civilStatuses = $this->civilStatusRepository->all(['id']);
            $cities = $this->cityRepository->all(['id']);
            $documentTypes = $this->documentTypeRepository->all(['id']);

            $this->command->getOutput()->progressStart($total);

            foreach ($users as $index => $user) {
                if (config('app.seeders_has_timer')) sleep(1);
                $this->info(__("seeders.users.item", ['index' => $index + 1, 'name' => $user->{UserEnum::Username}]));
                $user->save();

                $userPersonalInfo = $this->userPersonalInformationRepository->makeOneModel([
                    UserPersonalInformationEnum::GenderId => $genders->random(1)->first()->{GenderEnum::Id},
                    UserPersonalInformationEnum::CivilStatusId => $civilStatuses->random(1)->first()->{CivilStatusEnum::Id},
                    UserPersonalInformationEnum::CityId => $cities->random(1)->first()->{CityEnum::Id}
                ]);
                $userPersonalInfo->save();

                $user->{UserEnum::PersonalInformationId} = $userPersonalInfo->{UserPersonalInformationEnum::Id};
                $user->save();

                $userDocuments = $this->userDocumentRepository->makeOneModel([
                    UserDocumentEnum::UserId => $user->{UserEnum::Id},
                    UserDocumentEnum::DocumentTypeId => $documentTypes->random(1)->first()->{DocumentTypeEnum::Id},
                    UserDocumentEnum::IsCurrent => true
                ]);
                $userDocuments->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.users.finish", ['total' => $total]));
        }
    }
}
