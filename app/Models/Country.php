<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

use Spatie\Translatable\HasTranslations;

use App\Enums\CountryEnum;
use App\Enums\DepartmentEnum;
use App\Enums\CityEnum;

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
        CountryEnum::Id,
        CountryEnum::Name,
        CountryEnum::Slug
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
            if (isset($model->{CountryEnum::Name}) && !isset($model->{CountryEnum::Slug})) {
                $model->{CountryEnum::Slug} = Str::slug($model->{CountryEnum::Name}, '-', App::getLocale());
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
        return $this->attributes[CountryEnum::Slug] = Str::slug($value, '-', App::getLocale());
    }

    /**
     * Get the Departments of the Country.
     * 
     * @return HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Scope a query to only include Id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param array|int $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeById($query, $value)
    {
        $column = sprintf("%s.%s", CountryEnum::Table, CountryEnum::Id);
        if (is_array($value)) {
            return $query->whereIn($column, $value);
        } else {
            return $query->where($column, $value);
        }
    }

    /**
     * Scope a query to only include Name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByName($query, $value)
    {
        $locale = App::getLocale();
        $column = sprintf("%s.%s", CountryEnum::Table, CountryEnum::Name);
        return $query->where("{$column}->{$locale}", 'like', "%$value%");
    }

    /**
     * Scope a query to only include Slug.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBySlug($query, $value)
    {
        $locale = App::getLocale();
        $column = sprintf("%s.%s", CountryEnum::Table, CountryEnum::Slug);
        return $query->where($column, 'like', "%$value%");
    }
}
