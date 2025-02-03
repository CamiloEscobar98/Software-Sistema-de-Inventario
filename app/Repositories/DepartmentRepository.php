<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

use App\Enums\DepartmentEnum;

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

    /**
     * Get simple data
     * @param int $countryId
     * @return Collection
     */
    public function getSimpleDataByCountryId(int $countryId)
    {
        return $this->model->byCountryId($countryId)->pluck(DepartmentEnum::NAME, DepartmentEnum::ID)->sortBy(fn($name) => strtolower($name));;
    }

    /**
     * Get Department by CityId
     * @param int $cityId
     * @return Department
     */
    public function getByCityId(int $cityId)
    {
        return $this->model
            ->whereHas(DepartmentEnum::RELATION_CITY, fn($query) => $query->byId($cityId))
            ->first();
    }
}
