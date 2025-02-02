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
    public const TABLE = "inventory_product_movement_types";
    public const ID = "id";
    public const NAME = "name";
    public const IsEntry = "is_entry";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";

    public const FillableFields = [self::NAME, self::IsEntry];

    public const TranslatableFields = [self::NAME];
    /** ./Model */

    /* 
    * --------------------------------------------------
    * Default
    * --------------------------------------------------
    */
    public const ProductInputId = 1;
    public const ProductOutputId = 2;
}
