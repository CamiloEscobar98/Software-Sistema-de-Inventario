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
        Schema::create('setting_languages', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->json('name');
            $table->char('slug', 10);

            $table->unique('slug', 'unique_slug_languages');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_languages');
    }
};
