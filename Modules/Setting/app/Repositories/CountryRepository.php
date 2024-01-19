<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\Country;

class CountryRepository extends AbstractRepository
{
    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}
