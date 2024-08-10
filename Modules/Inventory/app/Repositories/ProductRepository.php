<?php

namespace Modules\Inventory\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Inventory\app\Models\Product;

/**
 * Class ProductRepository
 * 
 * @package Modules\Inventory\app\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property Product $model
 */
class ProductRepository extends AbstractRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
