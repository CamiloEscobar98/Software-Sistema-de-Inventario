<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Database\Factories\UserPersonalInformationFactory;

use App\Enums\UserPersonalInformationEnum;
use App\Enums\CityEnum;

class UserPersonalInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = UserPersonalInformationEnum::TABLE;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        UserPersonalInformationEnum::NAME,
        UserPersonalInformationEnum::EMAIL,
        UserPersonalInformationEnum::BIRTHDATE,
        UserPersonalInformationEnum::GENDER_ID,
        UserPersonalInformationEnum::CIVIL_STATUS_ID,
        UserPersonalInformationEnum::CITY_ID,
    ];

    protected static function newFactory(): UserPersonalInformationFactory
    {
        return UserPersonalInformationFactory::new();
    }

    /**
     * Get City
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, UserPersonalInformationEnum::CITY_ID, CityEnum::ID);
    }
}
