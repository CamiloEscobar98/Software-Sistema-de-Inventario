<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Setting\Database\factories\GenderFactory;

use Modules\Setting\app\Enums\GenderEnum;

class Gender extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = GenderEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        GenderEnum::Name,
        GenderEnum::Slug
    ];

    protected static function newFactory(): GenderFactory
    {
        return GenderFactory::new();
    }
}
