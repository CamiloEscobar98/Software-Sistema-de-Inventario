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
    public const Table = "inventory_product_categories";
    public const Id = "id";
    public const ProductCategoryId = "product_category_id";
    public const Name = "name";
    public const Info = "info";
    public const CreatedAt = "created_at";
    public const UpdatedAt = "updated_at";

    public const FillableFields = [
        self::ProductCategoryId,
        self::Name,
        self::Info,
        self::CreatedAt,
        self::UpdatedAt
    ];

    public const TranslatableFields = [
        self::Name,
        self::Info
    ];
    /** ./Model */
}
