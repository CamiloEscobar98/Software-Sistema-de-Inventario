<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Database\Factories\UserPersonalInformationFactory;

use App\Enums\UserPersonalInformationEnum;

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
