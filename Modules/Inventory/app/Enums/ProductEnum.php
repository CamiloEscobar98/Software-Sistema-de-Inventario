<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductEnum
 * @package Modules\Inventory\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const ProductCategoryId
 * @property const Name
 * @property const Info
 * @property const Price
 * @property const SkuCode
 * @property const CurrentStock
 * @property const MinimumStock
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class ProductEnum
{
    const Table = "inventory_products";
    const Id = "id";
    const ProductCategoryId = "product_category_id";
    const Name = "name";
    const Info = "info";
    const Price = "price";
    const SkuCode = "sku_code";
    const CurrentStock = "current_stock";
    const MinimumStock = "minimum_stock";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
