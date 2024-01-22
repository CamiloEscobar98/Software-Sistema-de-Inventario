<?php

namespace Modules\Tenant\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

use Modules\Tenant\Database\factories\TenantInformationFactory;

use Modules\Tenant\app\Enums\TenantInformationEnum;

/**
 * Class TenantInformation
 * 
 * @package Modules\Tenant\app\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string $slogan
 * @property string $address
 * @property string $telephone
 * @property string $phone
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class TenantInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = TenantInformationEnum::Table;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        TenantInformationEnum::Name,
        TenantInformationEnum::CityId,
        TenantInformationEnum::Slogan,
        TenantInformationEnum::Address,
        TenantInformationEnum::Telephone,
        TenantInformationEnum::Phone,
    ];

    protected static function newFactory(): TenantInformationFactory
    {
        return TenantInformationFactory::new();
    }
}
