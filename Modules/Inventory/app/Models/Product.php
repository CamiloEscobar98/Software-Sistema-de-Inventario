<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

use Modules\Inventory\database\factories\ProductFactory;

use Modules\Inventory\app\Enums\ProductEnum;

/**
 * Class Product
 * 
 * @package Modules\Inventory\app\Models
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $product_category_id
 * @property string $name
 * @property string $info
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = ProductEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [ProductEnum::Name, ProductEnum::Info];

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
