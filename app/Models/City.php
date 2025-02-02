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
}
