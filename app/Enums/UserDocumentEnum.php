<?php

namespace App\Enums;


/**
 * Class UserDocumentEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const Table
 * @property const UserId
 * @property const DocumentTypeId
 * @property const Document
 * @property const IsCurrent
 * @property const CreatedAt
 * @property const UpdatedAt
 */
class UserDocumentEnum
{
    const Table = 'auth_user_documents';
    const Id = 'id';
    const UserId = 'user_id';
    const DocumentTypeId = 'document_type_id';
    const Document = 'document';
    const IsCurrent = 'is_current';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';
}
