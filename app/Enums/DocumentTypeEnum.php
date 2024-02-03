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
                LanguageEnum::LANG_EN => 'Citizen ID',
            ],
            self::Slug => 'CC',
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Tarjeta de Identidad',
                LanguageEnum::LANG_EN => 'ID Card',
            ],
            self::Slug => 'TI',
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Registro Civil de Nacimiento',
                LanguageEnum::LANG_EN => 'Birth Certificate',
            ],
            self::Slug => 'RC',
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Cédula de Extranjería',
                LanguageEnum::LANG_EN => 'Foreigner ID',
            ],
            self::Slug => 'CE',
        ],
        [
            self::Name => [
                LanguageEnum::LANG_ES => 'Pasaporte',
                LanguageEnum::LANG_EN => 'Passport',
            ],
            self::Slug => 'PASS',
        ],
    ];
    /** ./Default Data */
}
