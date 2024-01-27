<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Department;

/**
 * Class DepartmentRepository
 * 
 * @package App\Repositories
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
