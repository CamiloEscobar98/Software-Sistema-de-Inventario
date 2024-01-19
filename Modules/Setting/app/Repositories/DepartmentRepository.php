<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\Department;

class DepartmentRepository extends AbstractRepository
{
    public function __construct(Department $model)
    {
        $this->model = $model;
    }
}
