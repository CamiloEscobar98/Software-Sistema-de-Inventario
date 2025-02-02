<?php

namespace App\Repositories;

use App\Enums\CivilStatusEnum;
use App\Repositories\AbstractRepository;

use App\Models\CivilStatus;
use Illuminate\Support\Collection;

/**
 * Class CivilStatusRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property CivilStatus $model
 */
class CivilStatusRepository extends AbstractRepository
{
    public function __construct(CivilStatus $model)
    {
        $this->model = $model;
    }

    /**
     * Get simple data
     * @return Collection
     */
    public function getSimpleData(): Collection
    {
        return $this->model->all()->pluck(CivilStatusEnum::NAME, CivilStatusEnum::ID);
    }
}
