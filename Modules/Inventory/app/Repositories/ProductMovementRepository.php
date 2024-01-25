<?php

namespace Modules\Inventory\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Inventory\app\Models\ProductMovement;

/**
 * Class ProductMovementRepository
 * 
 * @package Modules\Inventory\app\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property ProductMovement $model
 */
class ProductMovementRepository extends AbstractRepository
{
    public function __construct(ProductMovement $model)
    {
        $this->model = $model;
    }
}
