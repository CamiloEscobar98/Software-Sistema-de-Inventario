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
        UserPersonalInformationEnum::Email,
        UserPersonalInformationEnum::Birthdate,
        UserPersonalInformationEnum::GenderId,
        UserPersonalInformationEnum::CivilStatusId,
        UserPersonalInformationEnum::CityId,
    ];

    protected static function newFactory(): UserPersonalInformationFactory
    {
        return UserPersonalInformationFactory::new();
    }
}
