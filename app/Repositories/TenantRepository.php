<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Tenant;

/**
 * Class TenantRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Tenant $model
 */
class TenantRepository extends AbstractRepository
{
    public function __construct(Tenant $model)
    {
        $this->model = $model;
    }
}
