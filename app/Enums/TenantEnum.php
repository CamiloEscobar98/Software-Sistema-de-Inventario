<?php

namespace App\Enums;

/**
 * Class TenantEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const Url
 * @property const Host
 * @property const Port
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class TenantEnum
{
    const TABLE = "tenants";
    const ID = "id";
    const Url = "Url";
    const Host = "Host";
    const Port = "Port";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
