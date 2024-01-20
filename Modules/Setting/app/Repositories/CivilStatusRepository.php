<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\CivilStatus;

class CivilStatusRepository extends AbstractRepository
{
    public function __construct(CivilStatus $model)
    {
        $this->model = $model;
    }
}
