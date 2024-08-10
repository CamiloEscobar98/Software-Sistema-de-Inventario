<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\CivilStatus;

/**
 * Class CivilStatusRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property CivilStatus $model
 */
class CivilStatusRepository extends AbstractRepository
{
    public function __construct(CivilStatus $model)
    {
        $this->model = $model;
    }
}
