<?php

namespace Modules\Inventory\app\Enums;

/**
 * Class WarehouseEnum
 * 
 * @package Modules\Inventory\app\Enums
 * 
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 */
class WarehouseEnum
{
    /** Model */
    public const Table = "inventory_products";
    public const Id = "id";
    public const CityId = "city_id";
    public const Name = "name";
    public const Info = "info";
    public const Address = "address";
    public const Phone = "phone";
    public const Telephone = "telephone";
    public const CreatedAt = "created_at";
    public const UpdatedAt = "updated_at";

    public const FillableFields = [
        self::CityId,
        self::Name,
        self::Info,
        self::Address,
        self::Phone,
        self::Telephone,
    ];

    public const TranslatableFields = [
        self::Name,
        self::Info
    ];
    /** ./Model */

    /** Relations */

    /** ./Relations */
}
