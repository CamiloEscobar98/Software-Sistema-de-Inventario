<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductCategoryEnum
 * 
 * @package Modules\Inventory\app\Enums
 * 
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 */
class ProductCategoryEnum
{
    /** Model */
    public const TABLE = "inventory_product_categories";
    public const ID = "id";
    public const ProductCategoryId = "product_category_id";
    public const NAME = "name";
    public const Info = "info";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";

    public const FillableFields = [
        self::ProductCategoryId,
        self::NAME,
        self::Info,
        self::CREATED_AT,
        self::UPDATED_AT
    ];

    public const TranslatableFields = [
        self::NAME,
        self::Info
    ];
    /** ./Model */
}
