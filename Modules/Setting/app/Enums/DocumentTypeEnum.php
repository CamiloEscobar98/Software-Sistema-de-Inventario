<?php

namespace Modules\Setting\app\Enums;

/**
 * Class DocumentTypeEnum
 * @package Modules\Setting\app\Enums
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
    const Table = "setting_document_types";
    const Id = "id";
    const Name = "name";
    const Slug = "slug";
    const CreatedAt = "created_at";
    const UpdatedAt = "updated_at";
}
