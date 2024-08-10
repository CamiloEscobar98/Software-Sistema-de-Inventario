<?php

namespace Modules\Auth\app\Enums;


/**
 * Class UserEnum
 * @package Modules\Auth\app\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const Email
 * @property const Password
 * @property const RememberToken
 * @property const EmailVerifiedAt
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class UserEnum
{
    const Table = 'auth_users';
    const Id = 'id';
    const Email = 'email';
    const Password = 'password';
    const RememberToken = 'remember_token';
    const EmailVerifiedAt = 'email_verified_at';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';


    const PasswordResetTokenTable = 'auth_password_reset_tokens';
}
