<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Setting\Database\factories\DocumentTypeFactory;

use Modules\Setting\app\Enums\DocumentTypeEnum;

/**
 * Class DocumentType
 * 
 * @package Modules\Setting\app\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
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
