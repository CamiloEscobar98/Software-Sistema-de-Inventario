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
    public const Table = "inventory_products";
    public const Id = "id";
    public const ProductCategoryId = "product_category_id";
    public const Name = "name";
    public const Info = "info";
    public const Price = "price";
    public const SkuCode = "sku_code";
    public const CurrentStock = "current_stock";
    public const MinimumStock = "minimum_stock";
    public const CreatedAt = "created_at";
    public const UpdatedAt = "updated_at";

    public const FillableFields = [
        self::ProductCategoryId,
        self::Name,
        self::Info,
        self::Price,
        self::SkuCode,
        self::CurrentStock,
        self::MinimumStock,
    ];

    public const TranslatableFields = [
        self::Name,
        self::Info
    ];
    /** ./Model */
}
