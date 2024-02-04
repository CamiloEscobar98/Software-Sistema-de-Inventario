<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use Spatie\Translatable\HasTranslations;

use App\Enums\GenderEnum;
use App\Enums\UserEnum;
use App\Enums\UserPersonalInformationEnum;

/**
 * Class Gender
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
class Gender extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = GenderEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [GenderEnum::Name, GenderEnum::Slug];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        GenderEnum::Name,
        GenderEnum::Slug
    ];

    /**
     * Get Users.
     * 
     * @return HasManyThrough
     */
    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            UserPersonalInformation::class,
            UserPersonalInformationEnum::GenderId,
            UserEnum::PersonalInformationId,
            GenderEnum::Id,
            UserPersonalInformationEnum::Id,
        );
    }
}
