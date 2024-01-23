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
        Schema::create('setting_document_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 100)->unique('unique_name_document_types');
            $table->string('slug', 50)->unique('unique_slug_document_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_document_types');
    }
};
