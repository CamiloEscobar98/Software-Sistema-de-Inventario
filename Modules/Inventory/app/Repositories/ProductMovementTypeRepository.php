<?php

namespace Modules\Inventory\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Inventory\app\Models\ProductMovementType;

/**
 * Class ProductMovementTypeRepository
 * 
 * @package Modules\Inventory\app\Repositories
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property ProductMovementType $model
 */
class ProductMovementTypeRepository extends AbstractRepository
{
    public function __construct(ProductMovementType $model)
    {
        $this->model = $model;
    }
}
