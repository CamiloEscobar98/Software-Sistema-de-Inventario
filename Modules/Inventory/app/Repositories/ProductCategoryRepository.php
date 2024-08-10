<?php

namespace Modules\Inventory\app\Repositories;

use App\Repositories\AbstractRepository;

use Modules\Inventory\app\Models\ProductCategory;

/**
 * Class ProductCategoryRepository
 * 
 * @package Modules\Inventory\app\Repositories
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property ProductCategory $model
 */
class ProductCategoryRepository extends AbstractRepository
{
    public function __construct(ProductCategory $model)
    {
        $this->model = $model;
    }
}
