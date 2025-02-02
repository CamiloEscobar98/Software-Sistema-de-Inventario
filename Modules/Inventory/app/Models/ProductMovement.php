<?php

namespace Modules\Inventory\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Inventory\app\Enums\ProductMovementEnum;

/**
 * Class ProductMovement
 * 
 * @package Modules\Inventory\app\Models
 * @author Andrés Yáñez <camilo_escobar2398@outlook.com>
 * 
 * @property string $table
 * @property array $fillable
 * 
 * @property int $id
 * @property int $product_movement_type_id
 * @property string $product_id
 * @property string $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class ProductMovement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = ProductMovementEnum::TABLE;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        ProductMovementEnum::ProductMovementTypeId,
        ProductMovementEnum::ProductId,
        ProductMovementEnum::Quantity,
    ];
}
