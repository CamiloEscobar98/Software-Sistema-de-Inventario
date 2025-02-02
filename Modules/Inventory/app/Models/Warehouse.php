<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

use Modules\Inventory\Database\factories\WarehouseFactory;

use Modules\Inventory\app\Enums\WarehouseEnum;

class Warehouse extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = WarehouseEnum::TABLE;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = WarehouseEnum::FillableFields;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = WarehouseEnum::TranslatableFields;

    /**
     * New Factory
     * 
     * @return WarehouseFactory
     */
    protected static function newFactory(): WarehouseFactory
    {
        return WarehouseFactory::new();
    }
}
