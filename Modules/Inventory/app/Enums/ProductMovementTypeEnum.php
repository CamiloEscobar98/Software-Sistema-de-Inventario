<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductMovementTypeEnum
 * @package Modules\Inventory\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const Name
 * @property const IsEntry
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class ProductMovementTypeEnum
{

    /* 
    * --------------------------------------------------
    * Model
    * --------------------------------------------------
    */
    public const Table = "inventory_product_movement_types";
    public const Id = "id";
    public const Name = "name";
    public const IsEntry = "is_entry";
    public const CreatedAt = "created_at";
    public const UpdatedAt = "updated_at";

    /* 
    * --------------------------------------------------
    * Default
    * --------------------------------------------------
    */
    public const ProductInputId = 1;
    public const ProductOutputId = 2;
}
