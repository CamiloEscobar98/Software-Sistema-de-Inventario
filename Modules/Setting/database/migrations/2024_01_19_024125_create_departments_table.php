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
        Schema::create('setting_departments', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('country_id');
            $table->string('name', 100);
            $table->string('slug', 50);

            $table->unique(['country_id', 'name'], 'unique_name_departments');
            $table->unique(['country_id', 'slug'], 'unique_slug_departments');

            $table->foreign('country_id', 'fk_country_departments')->references('id')->on('setting_countries')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_departments');
    }
};
