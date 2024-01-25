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
            $table->unsignedBigInteger('id')->primary();
            $table->string('name', 150);
            $table->string('email', 250)->unique('unique_email_personal_information');
            $table->date('birthdate');
            $table->unsignedTinyInteger('gender_id');
            $table->unsignedTinyInteger('civil_status_id');
            $table->unsignedMediumInteger('city_id');

            $table->foreign('id', 'fk_users')
                ->references('id')
                ->on('auth_users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

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
