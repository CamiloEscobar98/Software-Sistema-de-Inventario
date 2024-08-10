<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductMovementEnum
 * @package Modules\Inventory\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const ProductMovementTypeId
 * @property const ProductId
 * @property const Quantity
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class ProductMovementEnum
{
    const Table = "inventory_product_movements";
    const Id = "id";
    const ProductMovementTypeId = "product_movement_type_id";
    const ProductId = "product_id";
    const Quantity = "quantity";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
