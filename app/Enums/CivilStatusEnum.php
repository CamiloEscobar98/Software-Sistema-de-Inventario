<?php

namespace App\Enums;

/**
 * Class CivilStatusEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class CivilStatusEnum
{
    /** Model */
    const Table = "setting_civil_statuses";
    const Id = "id";
    const Name = "name";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
    /** ./Model */

    /** Relations */
    /** ./Relations */

    /** Data */
    const SINGLE_ID = 1;
    const MARRIED_ID = 2;
    const WIDOWED_ID = 3;
    const DIVORCED_ID = 4;
    const COMMON_LAW_MARRIAGE_ID = 5;
    const SEPARATED_ID = 6;
    /** ./Data */

    /** GraphQL */
    /** ./GraphQL */

    /** Seeders */
    /** ./Seeders */

    /** DefaultData */
    const DefaultData = [
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Soltero(a)',
                LanguageEnum::LANG_EN => 'Single',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Casado(a)',
                LanguageEnum::LANG_EN => 'Married',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Viudo(a)',
                LanguageEnum::LANG_EN => 'Widowed',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Divorciado(a)',
                LanguageEnum::LANG_EN => 'Divorced',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Unión Libre',
                LanguageEnum::LANG_EN => 'Common-Law-Marriage',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Separado(a)',
                LanguageEnum::LANG_EN => 'Separated',
            ],
        ],
    ];
    /** ./DefaultData */
}
