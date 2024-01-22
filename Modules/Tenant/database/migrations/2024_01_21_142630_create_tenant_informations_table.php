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
            $table->unsignedMediumInteger('city_id')->nullable();
            $table->string('name', 150);
            $table->string('slogan');
            $table->string('address', 200);
            $table->string('telephone', 25)->nullable();
            $table->string('phone', 30)->nullable();
            
            $table->foreign('id', 'fk_tenant_information')->references('id')->on('tenants')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('city_id', 'fk_cities_tenant_information')->references('id')->on('setting_cities')->cascadeOnUpdate()->restrictOnDelete();
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
