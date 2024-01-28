<?php

namespace App\Enums;


/**
 * Class UserPersonalInformationEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Id
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
    const Table = 'auth_user_personal_information';
    const Id = 'id';
    const Name = 'name';
    const Email = 'email';
    const Birthdate = 'birthdate';
    const GenderId = 'gender_id';
    const CivilStatusId = 'civil_status_id';
    const CityId = 'city_id';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';
}
