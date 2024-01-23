<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Inventory\Database\factories\ProductFactory;

use Modules\Inventory\app\Enums\ProductEnum;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = ProductEnum::Table;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        ProductEnum::ProductCategoryId,
        ProductEnum::Name,
        ProductEnum::Info,
        ProductEnum::Price,
        ProductEnum::SkuCode,
        ProductEnum::CurrentStock,
        ProductEnum::MinimumStock,
    ];

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
