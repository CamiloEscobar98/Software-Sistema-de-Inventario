<?php

namespace App\Enums;

/**
 * Class CivilStatusEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class CivilStatusEnum
{
    /** Model */
    const Table = "setting_civil_statuses";
    const Id = "id";
    const Name = "name";
    const Slug = "slug";
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
            self::Slug => [
                LanguageEnum::LANG_ES => 'soltero',
                LanguageEnum::LANG_EN => 'single',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Casado(a)',
                LanguageEnum::LANG_EN => 'Married',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'casado',
                LanguageEnum::LANG_EN => 'married',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Viudo(a)',
                LanguageEnum::LANG_EN => 'Widowed',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'viudo',
                LanguageEnum::LANG_EN => 'widowed',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Divorciado(a)',
                LanguageEnum::LANG_EN => 'Divorced',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'divorciado',
                LanguageEnum::LANG_EN => 'divorced',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Unión Libre',
                LanguageEnum::LANG_EN => 'Common Law Marriage',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'union-libre',
                LanguageEnum::LANG_EN => 'common-law',
            ],
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Separado(a)',
                LanguageEnum::LANG_EN => 'Separated',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'separado',
                LanguageEnum::LANG_EN => 'separated',
            ],
        ],
    ];
    /** ./DefaultData */
}
