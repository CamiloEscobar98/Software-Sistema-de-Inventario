<?php

namespace Modules\Auth\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Auth\app\Models\User;

/**
 * Class UserRepository
 * 
 * @package Modules\Auth\app\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
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
