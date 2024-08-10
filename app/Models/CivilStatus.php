<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Spatie\Translatable\HasTranslations;

use App\Enums\CivilStatusEnum;

/**
 * Class CivilStatus
 * 
 * @package App\Models
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class CivilStatus extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = CivilStatusEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [CivilStatusEnum::Name, CivilStatusEnum::Slug];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        CivilStatusEnum::Name,
        CivilStatusEnum::Slug,
    ];
}
