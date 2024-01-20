<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Setting\Database\factories\CivilStatusFactory;

use Modules\Setting\app\Enums\CivilStatusEnum;

class CivilStatus extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = CivilStatusEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        CivilStatusEnum::Name,
        CivilStatusEnum::Slug,
    ];

    protected static function newFactory(): CivilStatusFactory
    {
        return CivilStatusFactory::new();
    }
}
