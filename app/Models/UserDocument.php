<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Database\Factories\UserDocumentFactory;

use App\Enums\UserDocumentEnum;

class UserDocument extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = UserDocumentEnum::TABLE;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        UserDocumentEnum::UserId,
        UserDocumentEnum::DocumentTypeId,
        UserDocumentEnum::Document,
        UserDocumentEnum::IsCurrent,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        UserDocumentEnum::IsCurrent => 'boolean',
    ];

    protected static function newFactory(): UserDocumentFactory
    {
        return UserDocumentFactory::new();
    }
}
