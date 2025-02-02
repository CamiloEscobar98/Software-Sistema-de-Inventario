<?php

namespace App\Enums;

/**
 * Class TenantInformationEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const CityId
 * @property const NAME
 * @property const Slogan
 * @property const Address
 * @property const Telephone
 * @property const Phone
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class TenantInformationEnum
{
    const TABLE = "tenant_informations";
    const ID = "id";
    const CityId = "city_id";
    const NAME = "name";
    const Slogan = "slogan";
    const Address = "address";
    const Telephone = "telephone";
    const Phone = "phone";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
