<?php

namespace App\Repositories;

use App\Enums\CityEnum;
use App\Repositories\AbstractRepository;

use App\Models\City;

/**
 * Class CityRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property City $model
 */
class CityRepository extends AbstractRepository
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * Get simple data
     * @param int $departmentId
     * @return Collection
     */
    public function getSimpleDataByDepartmentId(int $departmentId)
    {
        return $this->model->byDepartmentId($departmentId)->pluck(CityEnum::NAME, CityEnum::ID)->sortBy(fn($name) => strtolower($name));;
    }
}
