<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Spatie\Translatable\HasTranslations;

use Database\Factories\CityFactory;

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
    use HasFactory, HasTranslations;

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

    protected static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
}
