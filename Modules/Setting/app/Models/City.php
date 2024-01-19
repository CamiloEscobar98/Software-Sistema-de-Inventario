<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Modules\Setting\Database\factories\CityFactory;

use Modules\Setting\app\Enums\CityEnum;

/**
 * Class City
 * 
 * @package Modules\Setting\app\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class City extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = CityEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        CityEnum::DepartmentId,
        CityEnum::Name,
        CityEnum::Slug
    ];

    protected static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
}
