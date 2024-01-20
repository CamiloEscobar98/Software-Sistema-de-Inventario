<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\Department;

/**
 * Class DepartmentRepository
 * 
 * @package Modules\Setting\app\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Department $model
 */
class DepartmentRepository extends AbstractRepository
{
    public function __construct(Department $model)
    {
        $this->model = $model;
    }
}
