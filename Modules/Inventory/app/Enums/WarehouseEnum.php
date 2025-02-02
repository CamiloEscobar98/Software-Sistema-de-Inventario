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
    public const TABLE = "inventory_products";
    public const ID = "id";
    public const CityId = "city_id";
    public const NAME = "name";
    public const Info = "info";
    public const Address = "address";
    public const Phone = "phone";
    public const Telephone = "telephone";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";

    public const FillableFields = [
        self::CityId,
        self::NAME,
        self::Info,
        self::Address,
        self::Phone,
        self::Telephone,
    ];

    public const TranslatableFields = [
        self::NAME,
        self::Info
    ];
    /** ./Model */

    /** Relations */

    /** ./Relations */
}
