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
 * @property const BIRTHDATE
 * @property const GENDER_ID
 * @property const CIVIL_STATUS_ID
 * @property const CITY_ID
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class UserPersonalInformationEnum
{
    const TABLE = 'auth_user_personal_information';
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const BIRTHDATE = 'birthdate';
    const GENDER_ID = 'gender_id';
    const CIVIL_STATUS_ID = 'civil_status_id';
    const CITY_ID = 'city_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
