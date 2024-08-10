<?php

namespace App\Enums;

/**
 * Class LanguageEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const Id
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 * 
 * @property const DefaultData
 */
class LanguageEnum
{
    /** Model */
    const Table = 'setting_languages';
    const Id = 'id';
    const Name = 'name';
    const Slug = 'slug';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';

    const ES_ID = 1;
    const EN_ID = 2;

    /** Relations */

    /** GraphQL */
    const Locale = 'locale';

    /** Seeders */
    const DefaultData = [
        [
            self::Name => [
                self::LANG_ES => 'Español',
                self::LANG_EN => 'Spanish',
            ],
            self::Slug => Self::LANG_ES
        ],
        [
            self::Name => [
                self::LANG_ES => 'Inglés',
                self::LANG_EN => 'English',
            ],
            self::Slug => Self::LANG_EN

        ]
    ];

    /**
     * Languages
     */
    const LANG_ES = 'es';
    const LANG_EN = 'en';

    const LANG_AVAILABLES = [self::LANG_ES, self::LANG_EN];
}
