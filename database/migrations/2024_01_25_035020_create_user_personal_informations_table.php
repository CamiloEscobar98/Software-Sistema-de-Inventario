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
        Schema::create('auth_user_personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 250)->unique('unique_email_personal_information');
            $table->date('birthdate');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('civil_status_id');
            $table->unsignedMediumInteger('city_id');

            $table->foreign('gender_id', 'fk_gender_users')
                ->references('id')
                ->on('setting_genders')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('civil_status_id', 'fk_civil_status_users')
                ->references('id')
                ->on('setting_civil_statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('city_id', 'fk_city_users')
                ->references('id')
                ->on('setting_cities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_user_personal_information');
    }
};
