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
        Schema::create('tenant_informations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name', 150);
            $table->string('slogan');
            $table->string('address', 200);
            $table->string('telephone', 25)->nullable();
            $table->string('phone', 30)->nullable();
            $table->unsignedMediumInteger('city_id')->nullable();
            
            $table->foreign('id', 'fk_tenant_information')->references('id')->on('tenants')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_informations');
    }
};
