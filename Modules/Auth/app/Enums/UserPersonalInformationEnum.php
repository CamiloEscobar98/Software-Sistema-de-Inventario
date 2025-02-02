<?php

namespace Modules\Auth\app\Enums;


/**
 * Class UserPersonalInformationEnum
 * @package Modules\Auth\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const NAME
 * @property const Email
 * @property const Birthdate
 * @property const GenderId
 * @property const CivilStatusId
 * @property const CityId
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class UserPersonalInformationEnum
{
    const TABLE = 'auth_users';
    const ID = 'id';
    const NAME = 'name';
    const Email = 'email';
    const Birthdate = 'birthdate';
    const GenderId = 'gender_id';
    const CivilStatusId = 'gender_id';
    const CityId = 'city_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
