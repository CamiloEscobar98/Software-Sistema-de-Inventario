<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

use Spatie\Translatable\HasTranslations;

use App\Enums\DepartmentEnum;

/**
 * Class Department
 * 
 * @package App\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Department extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DepartmentEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [DepartmentEnum::Name];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        DepartmentEnum::Id,
        DepartmentEnum::CountryId,
        DepartmentEnum::Name,
        DepartmentEnum::Slug
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
            if (isset($model->{DepartmentEnum::Name}) && !isset($model->{DepartmentEnum::Slug})) {
                $model->{DepartmentEnum::Slug} = Str::slug($model->{DepartmentEnum::Name}, '-', App::getLocale());
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
        return $this->attributes[DepartmentEnum::Slug] = Str::slug($value, '-', App::getLocale());
    }

    /**
     * Get Cities.
     * 
     * @return HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
