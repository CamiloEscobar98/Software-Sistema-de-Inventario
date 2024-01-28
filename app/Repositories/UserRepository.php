<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;

use App\Models\User;

/**
 * Class UserRepository
 * 
 * @package App\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property User $model
 */
class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
