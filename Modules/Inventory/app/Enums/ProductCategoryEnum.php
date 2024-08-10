<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductCategoryEnum
 * @package Modules\Inventory\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const ProductCategoryId
 * @property const Name
 * @property const Info
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class ProductCategoryEnum
{
    const Table = "inventory_product_categories";
    const Id = "id";
    const ProductCategoryId = "product_category_id";
    const Name = "name";
    const Info = "info";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
