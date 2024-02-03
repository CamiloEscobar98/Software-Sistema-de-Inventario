<?php

namespace App\Enums;

/**
 * Class GenderEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Id
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class GenderEnum
{
    /** Model */
    const Table = 'setting_genders';
    const Id = 'id';
    const Name = 'name';
    const Slug = 'slug';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';

    /** Relations */

    /** GraphQL */

    /** Seeders */

    /** DefaultData */
    const MALE = [LanguageEnum::LANG_ES => 'Masculino', LanguageEnum::LANG_EN => 'Male'];
    const FEMALE = [LanguageEnum::LANG_ES => 'Femenino', LanguageEnum::LANG_EN => 'Female'];
    const NON_BINARY = [LanguageEnum::LANG_ES => 'No Binario', LanguageEnum::LANG_EN => 'Non-binary'];
    const TRANSGENDER = [LanguageEnum::LANG_ES => 'Tránsgenero', LanguageEnum::LANG_EN => 'Transgender'];

    const DEFAULT_GENDERS = [self::MALE, self::FEMALE, self::NON_BINARY, self::TRANSGENDER];
}
