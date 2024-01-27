<?php

namespace App\Enums;

/**
 * Class TenantInformationEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const CityId
 * @property const Name
 * @property const Slogan
 * @property const Address
 * @property const Telephone
 * @property const Phone
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class TenantInformationEnum
{
    const Table = "tenant_informations";
    const Id = "id";
    const CityId = "city_id";
    const Name = "name";
    const Slogan = "slogan";
    const Address = "address";
    const Telephone = "telephone";
    const Phone = "phone";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
