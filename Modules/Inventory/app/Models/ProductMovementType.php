<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Translatable\HasTranslations;

use Modules\Inventory\Database\factories\ProductMovementTypeFactory;

class ProductMovementType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): ProductMovementTypeFactory
    {
        return ProductMovementTypeFactory::new();
    }
}
