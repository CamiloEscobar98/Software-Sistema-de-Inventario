<?php

namespace App\Enums;

/**
 * Class TenantEnum
 * @package App\Enums
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
    const Id = "id";
    const Url = "Url";
    const Host = "Host";
    const Port = "Port";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
