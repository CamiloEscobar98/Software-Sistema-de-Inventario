<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Modules\Setting\Database\factories\CivilStatusFactory;

use Modules\Setting\app\Enums\CivilStatusEnum;

/**
 * Class CivilStatus
 * 
 * @package Modules\Setting\app\Models
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
