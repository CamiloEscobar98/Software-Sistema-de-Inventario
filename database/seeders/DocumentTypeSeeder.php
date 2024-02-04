<?php

namespace Database\Seeders;

use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Seeder;

use Symfony\Component\Console\Output\ConsoleOutput;

use App\Repositories\DocumentTypeRepository;

use App\Models\DocumentType;

use App\Enums\DocumentTypeEnum;
use App\Factories\DocumentTypeFactory;

/**
 * Class DocumentTypeSeeder
 * @package Database\Seeders
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property DocumentTypeRepository $documentTypeRepository
 * 
 * @method void run
 */
class DocumentTypeSeeder extends Seeder
{
    use InteractsWithIO;

    protected $documentTypeRepository;

    public function __construct(DocumentTypeRepository $documentTypeRepository)
    {
        $this->output = new ConsoleOutput();

        $this->documentTypeRepository = $documentTypeRepository;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!isProductionEnv()) {
            $document_types = DocumentTypeEnum::DefaultData;
            $total = count($document_types);

            $this->command->getOutput()->progressStart($total);
            foreach ($document_types as $index => $data) {
                if (config('app.seeders_has_timer')) sleep(1);
                $item = $this->documentTypeRepository->create(DocumentTypeFactory::create($data[DocumentTypeEnum::Name], $data[DocumentTypeEnum::Slug]));
                $this->info(__("seeders.document_types.item", ['index' => $index + 1, 'name' => $item->{DocumentTypeEnum::Name}]));

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("seeders.document_types.finish", ['total' => $total]));
        }
    }
}
