<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\Gender;

class GenderRepository extends AbstractRepository
{
    public function __construct(Gender $model)
    {
        $this->model = $model;
    }
}
