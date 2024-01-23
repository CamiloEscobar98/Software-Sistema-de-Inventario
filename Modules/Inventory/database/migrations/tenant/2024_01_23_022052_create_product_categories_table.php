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
        Schema::create('inventory_product_categories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('product_category_id')->nullable();
            $table->string('name', 150);
            $table->text('info');

            $table->unique(['product_category_id', 'name'], 'unique_name_product_categories');
            $table->foreign('product_category_id', 'fk_product_categories_nested')->references('id')->on('inventory_product_categories')->cascadeOnUpdate()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_product_categories');
    }
};
