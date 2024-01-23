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
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('product_category_id')->nullable();
            $table->string('name', 150);
            $table->text('info');
            $table->double('price');
            $table->string('sku_code', 50)->unique('unique_sku_code');
            $table->double('current_stock')->default(0);
            $table->double('minimum_stock')->default(0);   

            $table->unique(['product_category_id', 'name'], 'unique_name_products');
            $table->foreign('product_category_id', 'fk_product_categories_products')->references('id')->on('inventory_product_categories')->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_products');
    }
};
