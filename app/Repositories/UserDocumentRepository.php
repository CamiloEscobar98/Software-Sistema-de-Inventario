<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\UserDocument;

/**
 * Class UserDocumentRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
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
