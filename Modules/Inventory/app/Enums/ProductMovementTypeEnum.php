<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductMovementTypeEnum
 * @package Modules\Inventory\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const IsEntry
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class ProductMovementTypeEnum
{
    const Table = "inventory_product_movement_types";
    const Id = "id";
    const Name = "name";
    const IsEntry = "is_entry";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
