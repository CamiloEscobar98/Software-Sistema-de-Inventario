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
        Schema::create('setting_civil_statuses', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', '100')->unique('unique_name_civil_statuses');
            $table->string('slug', '20')->unique('unique_slug_civil_statuses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_civil_statuses');
    }
};
