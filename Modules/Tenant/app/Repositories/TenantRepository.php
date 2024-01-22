<?php

namespace Modules\Tenant\app\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Tenant;

/**
 * Class TenantRepository
 * 
 * @package Modules\Tenant\app\Repositories
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
