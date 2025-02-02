<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductMovementEnum
 * 
 * @package Modules\Inventory\app\Enums
 * 
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 */
class ProductMovementEnum
{
    /** Model */
    public const TABLE = "inventory_product_movements";
    public const ID = "id";
    public const ProductMovementTypeId = "product_movement_type_id";
    public const ProductId = "product_id";
    public const Quantity = "quantity";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";

    public const FillableFields = [
        self::ProductMovementTypeId,
        self::ProductMovementTypeId,
        self::ProductMovementTypeId,
        self::ProductMovementTypeId,
        self::ProductMovementTypeId,
    ];
    /** ./Model */
}
