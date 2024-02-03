<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

use Database\Factories\UserFactory;

use App\Enums\UserEnum;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = UserEnum::Table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserEnum::Username,
        UserEnum::Email,
        UserEnum::Password,
        UserEnum::RememberToken,
        UserEnum::EmailVerifiedAt,
        UserEnum::Attrs,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserEnum::Password,
        UserEnum::RememberToken,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserEnum::EmailVerifiedAt => 'datetime',
        UserEnum::Password => 'hashed',
        UserEnum::Attrs => 'array'
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
