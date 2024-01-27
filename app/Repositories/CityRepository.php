<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\City;

/**
 * Class CityRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property City $model
 */
class CityRepository extends AbstractRepository
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
