<?php

namespace App\Enums;


/**
 * Class UserDocumentEnum
 * @package App\Enums
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property const TABLE
 * @property const UserId
 * @property const DocumentTypeId
 * @property const Document
 * @property const IsCurrent
 * @property const CREATED_AT
 * @property const UPDATED_AT
 */
class UserDocumentEnum
{
    const TABLE = 'auth_user_documents';
    const ID = 'id';
    const UserId = 'user_id';
    const DocumentTypeId = 'document_type_id';
    const Document = 'document';
    const IsCurrent = 'is_current';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
