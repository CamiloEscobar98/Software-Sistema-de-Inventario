<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\DocumentType;

/**
 * Class DocumentTypeRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
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
