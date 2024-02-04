<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

use Spatie\Translatable\HasTranslations;

use App\Enums\CityEnum;

/**
 * Class City
 * 
 * @package App\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class City extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = CityEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [CityEnum::Name];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        CityEnum::Id,
        CityEnum::DepartmentId,
        CityEnum::Name,
        CityEnum::Slug
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (isset($model->{CityEnum::Name}) && !isset($model->{CityEnum::Slug})) {
                $model->{CityEnum::Slug} = Str::slug($model->{CityEnum::Name}, '-', App::getLocale());
            }
        });
    }

    /**
     * Set the Slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        return $this->attributes[CityEnum::Slug] = Str::slug($value, '-', App::getLocale());
    }
}
