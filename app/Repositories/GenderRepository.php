<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Gender;

/**
 * Class GenderRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Gender $model
 */
class GenderRepository extends AbstractRepository
{
    public function __construct(Gender $model)
    {
        $this->model = $model;
    }
}
