<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\TenantInformation;

/**
 * Class TenantInformationRepository
 * 
 * @package App\Repositories
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
