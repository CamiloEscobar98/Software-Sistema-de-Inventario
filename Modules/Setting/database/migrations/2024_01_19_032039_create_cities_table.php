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
        Schema::create('setting_cities', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('department_id');
            $table->json('name');
            $table->string('slug', 50);

            $table->unique(['department_id', 'slug'], 'unique_slug_cities');

            $table->foreign('department_id', 'fk_department_cities')->references('id')->on('setting_departments')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_cities');
    }
};
