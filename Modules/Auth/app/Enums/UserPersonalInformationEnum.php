<?php

namespace Modules\Auth\app\Enums;


/**
 * Class UserPersonalInformationEnum
 * @package Modules\Auth\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Email
 * @property const Birthdate
 * @property const GenderId
 * @property const CivilStatusId
 * @property const CityId
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class UserPersonalInformationEnum
{
    const Table = 'auth_users';
    const Id = 'id';
    const Name = 'name';
    const Email = 'email';
    const Birthdate = 'birthdate';
    const GenderId = 'gender_id';
    const CivilStatusId = 'gender_id';
    const CityId = 'city_id';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';
}
