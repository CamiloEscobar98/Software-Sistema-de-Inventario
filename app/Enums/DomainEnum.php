<?php

namespace App\Enums;

/**
 * Class DomainEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const ID
 * @property const Domain
 * @property const TenantId
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class DomainEnum
{
    const TABLE = "tenant_domains";
    const ID = "id";
    const Domain = "domain";
    const TenantId = "tenant_id";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
