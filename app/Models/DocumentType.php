<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

use App\Enums\DocumentTypeEnum;

/**
 * Class DocumentType
 * 
 * @package App\Models
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
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
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DocumentTypeEnum::TABLE;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [DocumentTypeEnum::NAME, DocumentTypeEnum::SLUG];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        DocumentTypeEnum::NAME,
        DocumentTypeEnum::SLUG,
    ];
}
