<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\UserPersonalInformation;

/**
 * Class UserPersonalInformationRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property UserPersonalInformation $model
 */
class UserPersonalInformationRepository extends AbstractRepository
{
    public function __construct(UserPersonalInformation $model)
    {
        $this->model = $model;
    }
}
