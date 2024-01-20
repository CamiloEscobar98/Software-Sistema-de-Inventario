<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\CivilStatus;

/**
 * Class CivilStatusRepository
 * 
 * @package Modules\Setting\app\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
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
