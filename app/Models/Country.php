<?php

namespace App\Models;

use App\Enums\CityEnum;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use Spatie\Translatable\HasTranslations;

use Database\Factories\CountryFactory;

use App\Enums\CountryEnum;
use App\Enums\DepartmentEnum;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

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

    /**
     * Get the Departments of the Country.
     * 
     * @return HasMany
     */
    public function departments()
    {
        $array = getSelectColumnsByTable(DepartmentEnum::Fields, DepartmentEnum::Table);
        return $this->hasMany(Department::class)->select($array);
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
        $column = sprintf("%s.%s", CountryEnum::Table, CountryEnum::Slug);
        return $query->where($column, 'like', "%$value%");
    }
}
