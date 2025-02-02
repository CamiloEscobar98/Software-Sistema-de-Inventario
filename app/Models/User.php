<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

use Database\Factories\UserFactory;

use App\Enums\UserEnum;
use App\Enums\UserPersonalInformationEnum;
use App\Factories\UserAttrsFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = UserEnum::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserEnum::USERNAME,
        UserEnum::EMAIL,
        UserEnum::PASSWORD,
        UserEnum::REMEMBER_TOKEN,
        UserEnum::EMAIL_VERIFIED_AT,
        UserEnum::ATTRS,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserEnum::PASSWORD,
        UserEnum::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserEnum::EMAIL_VERIFIED_AT => 'datetime',
        UserEnum::PASSWORD => 'hashed',
        UserEnum::ATTRS => 'array'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [UserEnum::RELATION_PERSONAL_INFORMATION];

    /**
     * Model Factory
     * @return UserFactory
     */
    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(fn($model) => $model->{UserEnum::ATTRS} = UserAttrsFactory::buildAttrs());
    }

    /**
     * The personal information
     * @return BelongsTo
     */
    public function personal_information(): BelongsTo
    {
        return $this->belongsTo(UserPersonalInformation::class, UserEnum::PERSONAL_INFORMATION_ID, UserPersonalInformationEnum::ID);
    }
}
