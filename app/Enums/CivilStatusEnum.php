<?php

namespace App\Enums;

/**
 * Class CivilStatusEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class CivilStatusEnum
{
    /** Model */
    const TABLE = "setting_civil_statuses";
    const ID = "id";
    const NAME = "name";
    const SLUG = "slug";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
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
            self::NAME => [
                LanguageEnum::LANG_ES => 'Soltero(a)',
                LanguageEnum::LANG_EN => 'Single',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'soltero',
                LanguageEnum::LANG_EN => 'single',
            ],
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Casado(a)',
                LanguageEnum::LANG_EN => 'Married',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'casado',
                LanguageEnum::LANG_EN => 'married',
            ],
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Viudo(a)',
                LanguageEnum::LANG_EN => 'Widowed',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'viudo',
                LanguageEnum::LANG_EN => 'widowed',
            ],
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Divorciado(a)',
                LanguageEnum::LANG_EN => 'Divorced',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'divorciado',
                LanguageEnum::LANG_EN => 'divorced',
            ],
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Unión Libre',
                LanguageEnum::LANG_EN => 'Common Law Marriage',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'union-libre',
                LanguageEnum::LANG_EN => 'common-law',
            ],
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Separado(a)',
                LanguageEnum::LANG_EN => 'Separated',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'separado',
                LanguageEnum::LANG_EN => 'separated',
            ],
        ],
    ];
    /** ./DefaultData */
}
