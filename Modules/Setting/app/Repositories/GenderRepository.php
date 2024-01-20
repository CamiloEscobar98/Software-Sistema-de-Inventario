<?php

namespace Modules\Setting\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Setting\app\Models\Gender;

/**
 * Class GenderRepository
 * 
 * @package Modules\Setting\app\Repositories
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
