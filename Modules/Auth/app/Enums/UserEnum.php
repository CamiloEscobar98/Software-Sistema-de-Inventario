<?php

namespace Modules\Auth\app\Enums;


/**
 * Class UserEnum
 * @package Modules\Auth\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * @property const TABLE
 * @property const ID
 * @property const EMAIL
 * @property const PASSWORD
 * @property const REMEMBER_TOKEN
 * @property const EMAIL_VERIFIED_AT
 * @property const CREATED_AT
 * @property const UPDATED_AT
 * @property const PASSWORD_RESET_TOKEN
 */
class UserEnum
{
    const TABLE = 'auth_users';
    const ID = 'id';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const REMEMBER_TOKEN = 'remember_token';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    const PASSWORD_RESET_TOKEN = 'auth_password_reset_tokens';
}
