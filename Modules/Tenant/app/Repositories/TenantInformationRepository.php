<?php

namespace Modules\Tenant\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Tenant\app\Models\TenantInformation;

/**
 * Class TenantInformationRepository
 * 
 * @package Modules\Tenant\app\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property TenantInformation $model
 */
class TenantInformationRepository extends AbstractRepository
{
    public function __construct(TenantInformation $model)
    {
        $this->model = $model;
    }
}
