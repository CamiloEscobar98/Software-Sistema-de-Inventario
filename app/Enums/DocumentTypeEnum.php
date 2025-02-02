<?php

namespace App\Enums;

/**
 * Class DocumentTypeEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const NAME
 * @property const SLUG
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class DocumentTypeEnum
{
    /** Model */
    const TABLE = "setting_document_types";
    const ID = "id";
    const NAME = "name";
    const SLUG = "slug";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    /** ./Model */

    /** Relations */
    /** ./Relations */

    /** Data */
    const CC_ID = 1;
    const TI_ID = 2;
    const RC_ID = 3;
    const CE_ID = 4;
    const PASS_ID = 5;
    /** ./Data */

    /** GraphQL */
    /** ./GraphQL */

    /** Seeders */
    /** ./Seeders */

    /** Default Data */
    const DefaultData = [
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Cédula de Ciudadanía',
                LanguageEnum::LANG_EN => 'Citizen Identity',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'cedula-de-ciudadania',
                LanguageEnum::LANG_EN => 'citizen-identity',
            ]
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Tarjeta de Identidad',
                LanguageEnum::LANG_EN => 'Identity Card',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'tarjeta-de-identidad',
                LanguageEnum::LANG_EN => 'identity-card',
            ]
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Registro Civil de Nacimiento',
                LanguageEnum::LANG_EN => 'Birth Certificate',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'registro-civil',
                LanguageEnum::LANG_EN => 'birth-certificate',
            ]
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Cédula de Extranjería',
                LanguageEnum::LANG_EN => 'Foreigner Identity',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'cedula-de-extranjeria',
                LanguageEnum::LANG_EN => 'foreigner-identity',
            ]
        ],
        [
            self::NAME => [
                LanguageEnum::LANG_ES => 'Pasaporte',
                LanguageEnum::LANG_EN => 'Passport',
            ],
            self::SLUG => [
                LanguageEnum::LANG_ES => 'pasaporte',
                LanguageEnum::LANG_EN => 'passport',
            ]
        ],
    ];
    /** ./Default Data */
}
