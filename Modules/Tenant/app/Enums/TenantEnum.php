<?php

namespace Modules\Tenant\app\Enums;

/**
 * Class TenantEnum
 * @package Modules\Tenant\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Url
 * @property const Host
 * @property const Port
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class TenantEnum
{
    const Table = "tenants";
    const Url = "Url";
    const Host = "Host";
    const Port = "Port";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
