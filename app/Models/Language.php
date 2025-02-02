<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use Spatie\Translatable\HasTranslations;

use App\Enums\LanguageEnum;

/**
 * Class Language
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
class Language extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = LanguageEnum::TABLE;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [LanguageEnum::NAME];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        LanguageEnum::NAME,
        LanguageEnum::SLUG,
    ];
}
