<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class ProductEnum
 * 
 * @package Modules\Inventory\app\Enums
 * 
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 */
class ProductEnum
{
    /** Model */
    public const TABLE = "inventory_products";
    public const ID = "id";
    public const ProductCategoryId = "product_category_id";
    public const NAME = "name";
    public const Info = "info";
    public const Price = "price";
    public const SkuCode = "sku_code";
    public const CurrentStock = "current_stock";
    public const MinimumStock = "minimum_stock";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";

    public const FillableFields = [
        self::ProductCategoryId,
        self::NAME,
        self::Info,
        self::Price,
        self::SkuCode,
        self::CurrentStock,
        self::MinimumStock,
    ];

    public const TranslatableFields = [
        self::NAME,
        self::Info
    ];
    /** ./Model */
}
