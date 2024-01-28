<?php

namespace App\Enums;


/**
 * Class UserEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * 
 * @property const Id
 * @property const Username
 * @property const Email
 * @property const Password
 * @property const RememberToken
 * @property const EmailVerifiedAt
 * @property const CreatedAt
 * @property const UpdatedAt
 * 
 * @property const PasswordResetTokenTable
 */
class UserEnum
{
    const Table = 'auth_users';
    const Id = 'id';
    const PersonalInformationId = 'personal_information_id';
    const Username = 'username';
    const Email = 'email';
    const Password = 'password';
    const RememberToken = 'remember_token';
    const EmailVerifiedAt = 'email_verified_at';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';


    const PasswordResetTokenTable = 'auth_password_reset_tokens';
}
