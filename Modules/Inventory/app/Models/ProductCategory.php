<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

use Modules\Inventory\Database\factories\ProductCategoryFactory;

use Modules\Inventory\app\Enums\ProductCategoryEnum;

/**
 * Class ProductCategory
 * 
 * @package Modules\Inventory\app\Models
 * @author Andrés Yáñez <andres.escobar.aplicasoftware@gmail.com>
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
class ProductCategory extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = ProductCategoryEnum::Table;

    /**
     * The columns can be translated.
     * 
     * @var array
     */
    public $translatable = [ProductCategoryEnum::Name];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        ProductCategoryEnum::ProductCategoryId,
        ProductCategoryEnum::Name,
        ProductCategoryEnum::Info,
    ];

    protected static function newFactory(): ProductCategoryFactory
    {
        return ProductCategoryFactory::new();
    }
}
