<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Auth\Database\factories\UserPersonalInformationFactory;

use Modules\Auth\app\Enums\UserPersonalInformationEnum;

class UserPersonalInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = UserPersonalInformationEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        UserPersonalInformationEnum::Name,
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
