<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\UserDocument;

/**
 * Class UserDocumentRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property UserDocument $model
 */
class UserDocumentRepository extends AbstractRepository
{
    public function __construct(UserDocument $model)
    {
        $this->model = $model;
    }
}
