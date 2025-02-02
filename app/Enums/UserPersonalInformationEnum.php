<?php

namespace App\Enums;


/**
 * Class UserPersonalInformationEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const ID
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
    const TABLE = 'auth_user_personal_information';
    const ID = 'id';
    const NAME = 'name';
    const Email = 'email';
    const Birthdate = 'birthdate';
    const GenderId = 'gender_id';
    const CivilStatusId = 'civil_status_id';
    const CityId = 'city_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
