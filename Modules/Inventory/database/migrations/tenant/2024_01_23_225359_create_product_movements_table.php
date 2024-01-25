<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_product_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('product_movement_type_id');
            $table->unsignedInteger('product_id');
            $table->double('quantity')->default(0);

            $table->foreign('product_movement_type_id', 'fk_product_movement_types_product_movements')
                ->references('id')
                ->on('inventory_product_movement_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('product_id', 'fk_products_product_movements')
                ->references('id')
                ->on('inventory_products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_product_movements');
    }
};
