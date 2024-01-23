<?php

namespace Modules\Setting\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Spatie\Translatable\HasTranslations;

use Modules\Setting\Database\factories\DepartmentFactory;

use Modules\Setting\app\Enums\DepartmentEnum;

/**
 * Class Department
 * 
 * @package Modules\Setting\app\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Department extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DepartmentEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [DepartmentEnum::Name];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        DepartmentEnum::CountryId,
        DepartmentEnum::Name,
        DepartmentEnum::Slug
    ];

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
