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
        Schema::create('setting_genders', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', '100')->unique('unique_name_genders');
            $table->string('slug', '20')->unique('unique_slug_genders');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_genders');
    }
};
