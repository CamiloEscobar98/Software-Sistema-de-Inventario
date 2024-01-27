<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Spatie\Translatable\HasTranslations;

use Database\factories\CountryFactory;

use App\Enums\CountryEnum;

/**
 * Class Country
 * 
 * @package App\Models
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
class Country extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = CountryEnum::Table;
    
    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [CountryEnum::Name];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        CountryEnum::Name,
        CountryEnum::Slug
    ];

    protected static function newFactory(): CountryFactory
    {
        return CountryFactory::new();
    }
}
