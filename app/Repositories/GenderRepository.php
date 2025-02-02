<?php

namespace App\Repositories;

use App\Enums\GenderEnum;
use App\Repositories\AbstractRepository;

use App\Models\Gender;
use Illuminate\Support\Collection;

/**
 * Class GenderRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property Gender $model
 */
class GenderRepository extends AbstractRepository
{
    /**
     * Construct
     */
    public function __construct(Gender $model)
    {
        $this->model = $model;
    }

    /**
     * Get simple data
     * @return Collection
     */
    public function getSimpleData() : Collection {
        return $this->model->all()->pluck(GenderEnum::NAME, GenderEnum::ID);
    }
}
