<?php

namespace App\Enums;

/**
 * Class DocumentTypeEnum
 * @package App\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property const Table
 * @property const Name
 * @property const Slug
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class DocumentTypeEnum
{
    /** Model */
    const Table = "setting_document_types";
    const Id = "id";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
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
            self::Name => [
                LanguageEnum::LANG_ES => 'Cédula de Ciudadanía',
                LanguageEnum::LANG_EN => 'Citizen Identity',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'cedula-de-ciudadania',
                LanguageEnum::LANG_EN => 'citizen-identity',
            ]
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Tarjeta de Identidad',
                LanguageEnum::LANG_EN => 'Identity Card',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'tarjeta-de-identidad',
                LanguageEnum::LANG_EN => 'identity-card',
            ]
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Registro Civil de Nacimiento',
                LanguageEnum::LANG_EN => 'Birth Certificate',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'registro-civil',
                LanguageEnum::LANG_EN => 'birth-certificate',
            ]
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Cédula de Extranjería',
                LanguageEnum::LANG_EN => 'Foreigner Identity',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'cedula-de-extranjeria',
                LanguageEnum::LANG_EN => 'foreigner-identity',
            ]
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Pasaporte',
                LanguageEnum::LANG_EN => 'Passport',
            ],
            self::Slug => [
                LanguageEnum::LANG_ES => 'pasaporte',
                LanguageEnum::LANG_EN => 'passport',
            ]
        ],
    ];
    /** ./Default Data */
}
