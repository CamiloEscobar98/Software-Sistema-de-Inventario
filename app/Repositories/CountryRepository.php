<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\Country;

/**
 * Class CountryRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property Country $model
 */
class CountryRepository extends AbstractRepository
{
    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}
