<?php

namespace App\Enums;

/**
 * Class DomainEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Id
 * @property const Domain
 * @property const TenantId
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class DomainEnum
{
    const Table = "tenant_domains";
    const Id = "id";
    const Domain = "domain";
    const TenantId = "tenant_id";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
