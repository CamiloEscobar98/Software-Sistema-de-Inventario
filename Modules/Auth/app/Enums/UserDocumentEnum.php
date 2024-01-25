<?php

namespace Modules\Auth\app\Enums;


/**
 * Class UserDocumentEnum
 * @package Modules\Auth\app\Enums
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
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
    const Table = 'auth_users';
    const Id = 'id';
    const UserId = 'user_id';
    const DocumentTypeId = 'document_type_id';
    const Document = 'document';
    const IsCurrent = 'is_current';
    const CreatedAt = 'created_at';
    const UpdatedAt = 'updated_at';
}
