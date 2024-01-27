<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

use Modules\Inventory\Database\Factories\ProductMovementTypeFactory;

use Modules\Inventory\app\Enums\ProductMovementTypeEnum;

class ProductMovementType extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = ProductMovementTypeEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        ProductMovementTypeEnum::Name,
        ProductMovementTypeEnum::IsEntry,
    ];

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [ProductMovementTypeEnum::Name];

    protected static function newFactory(): ProductMovementTypeFactory
    {
        return ProductMovementTypeFactory::new();
    }
}
