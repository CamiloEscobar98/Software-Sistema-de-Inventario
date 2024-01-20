<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\DocumentType;

/**
 * Class DocumentTypeRepository
 * 
 * @package Modules\Setting\app\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property DocumentType $model
 */
class DocumentTypeRepository extends AbstractRepository
{
    public function __construct(DocumentType $model)
    {
        $this->model = $model;
    }
}
