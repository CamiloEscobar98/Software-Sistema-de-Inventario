<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Department;

/**
 * Class DepartmentRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
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
