<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Auth\database\factories\UserPersonalInformationFactory;

use Modules\Auth\app\Enums\UserPersonalInformationEnum;

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
}
