<?php

namespace App\Enums;

/**
 * Class LanguageEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const ID
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 * 
 * @property const DefaultData
 */
class LanguageEnum
{
    /** Model */
    const TABLE = 'setting_languages';
    const ID = 'id';
    const NAME = 'name';
    const SLUG = 'slug';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const ES_ID = 1;
    const EN_ID = 2;

    /** Relations */

    const LOCALE = 'locale';

    /** Seeders */
    const DEFAULT_DATA = [
        [
            self::NAME => [
                self::LANG_ES => 'Español',
                self::LANG_EN => 'Spanish',
            ],
            self::SLUG => Self::LANG_ES
        ],
        [
            self::NAME => [
                self::LANG_ES => 'Inglés',
                self::LANG_EN => 'English',
            ],
            self::SLUG => Self::LANG_EN

        ]
    ];

    /**
     * Languages
     */
    const LANG_ES = 'es';
    const LANG_EN = 'en';

    const LANG_AVAILABLES = [self::LANG_ES, self::LANG_EN];
}
