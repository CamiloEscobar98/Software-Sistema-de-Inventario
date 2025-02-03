<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Spatie\Translatable\HasTranslations;

use App\Enums\CityEnum;
use App\Enums\CountryEnum;
use App\Enums\DepartmentEnum;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * Class City
 * @package App\Models
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * @property string $table
 * @property array $fillable
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
    protected $table = CityEnum::TABLE;

    /**
     * The columns can be translated.
     * @var array
     */
    public $translatable = [CityEnum::NAME];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        CityEnum::ID,
        CityEnum::DEPARTMENT_ID,
        CityEnum::NAME,
        CityEnum::SLUG
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        CityEnum::RELATION_DEPARMENT,
        CityEnum::RELATION_COUNTRY
    ];

    /**
     * The "booting" method of the model.
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (isset($model->{CityEnum::NAME}) && !isset($model->{CityEnum::SLUG})) {
                $model->{CityEnum::SLUG} = Str::SLUG($model->{CityEnum::NAME}, '-', App::getLocale());
            }
        });
    }

    /**
     * The department
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, CityEnum::DEPARTMENT_ID, DepartmentEnum::ID);
    }

    /**
     * The country
     * @return HasOneThrough
     */
    public function country()
    {
        return $this->hasOneThrough(
            Country::class,
            Department::class,
            DepartmentEnum::ID,
            CountryEnum::ID,
            CityEnum::DEPARTMENT_ID,
            DepartmentEnum::COUNTRY_ID
        );
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
        $column = sprintf("%s.%s", CityEnum::TABLE, CityEnum::ID);
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
        $column = sprintf("%s.%s", CityEnum::TABLE, CityEnum::NAME);
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
        $column = sprintf("%s.%s", CityEnum::TABLE, CityEnum::SLUG);
        return $query->where($column, 'like', "%$value%");
    }

    /**
     * Scope a query to only include DepartmentId
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param int|array $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByDepartmentId($query, $value)
    {
        if (is_array($value)) {
            return $query->whereIn(CityEnum::DEPARTMENT_ID, $value);
        }
        return $query->where(CityEnum::DEPARTMENT_ID, $value);
    }
}
