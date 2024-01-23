<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

use Modules\Setting\Database\factories\GenderFactory;

use Modules\Setting\app\Enums\GenderEnum;

/**
 * Class Gender
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
class Gender extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = GenderEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [GenderEnum::Name];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        GenderEnum::Name,
        GenderEnum::Slug
    ];

    protected static function newFactory(): GenderFactory
    {
        return GenderFactory::new();
    }
}
