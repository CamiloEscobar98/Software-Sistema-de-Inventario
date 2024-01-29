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
        return $this->hasMany(Department::class);
    }

    /**
     * Get the Cities of the Country.
     * 
     * @return HasManyThrough
     */
    public function cities()
    {
        return $this->hasManyThrough(
            City::class,
            Department::class,
            DepartmentEnum::CountryId,
            CityEnum::DepartmentId,
            CountryEnum::Id,
            DepartmentEnum::Id
        );
    }
}
