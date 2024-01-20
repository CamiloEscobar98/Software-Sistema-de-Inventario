<?php

namespace Modules\Setting\database\seeders;

use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Seeder;

use Symfony\Component\Console\Output\ConsoleOutput;

use Modules\Setting\app\Repositories\DocumentTypeRepository;

use Modules\Setting\app\Models\DocumentType;

/**
 * Class DocumentTypeSeeder
 * @package Modules\Setting\database\seeders
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
            $documentTypeEnum = (int) $this->command->ask(__("setting::seeders.document_types.ask"), 5);
            $documentTypeEnum = !is_numeric($documentTypeEnum) || $documentTypeEnum <= 0 ? 5 : $documentTypeEnum;
            $document_types = DocumentType::factory($documentTypeEnum)->make();

            $this->command->getOutput()->progressStart($documentTypeEnum);
            foreach ($document_types as $index => $item) {
                sleep(1);
                $this->info(__("setting::seeders.document_types.item", ['index' => $index + 1, 'name' => $item->name]));
                $item->save();

                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
            $this->command->info(__("setting::seeders.document_types.finish", ['total' => $documentTypeEnum]));
        }
    }
}
