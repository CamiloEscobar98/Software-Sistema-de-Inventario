<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductMovementTypeEnum
 * 
 * @package Modules\Inventory\app\Enums
 * 
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 */
class ProductMovementTypeEnum
{

    /** Model */
    public const Table = "inventory_product_movement_types";
    public const Id = "id";
    public const Name = "name";
    public const IsEntry = "is_entry";
    public const CreatedAt = "created_at";
    public const UpdatedAt = "updated_at";

    public const FillableFields = [self::Name, self::IsEntry];

    public const TranslatableFields = [self::Name];
    /** ./Model */

    /* 
    * --------------------------------------------------
    * Default
    * --------------------------------------------------
    */
    public const ProductInputId = 1;
    public const ProductOutputId = 2;
}
