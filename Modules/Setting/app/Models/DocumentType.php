<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Setting\Database\factories\DocumentTypeFactory;

use Modules\Setting\app\Enums\DocumentTypeEnum;

class DocumentType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DocumentTypeEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        DocumentTypeEnum::Name,
        DocumentTypeEnum::Slug,
    ];

    protected static function newFactory(): DocumentTypeFactory
    {
        return DocumentTypeFactory::new();
    }
}
