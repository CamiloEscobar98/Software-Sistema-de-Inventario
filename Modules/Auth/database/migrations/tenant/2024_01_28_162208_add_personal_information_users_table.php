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
        Schema::table('auth_users', function (Blueprint $table) {
            $table->unsignedBigInteger('personal_information_id')->nullable()->after('id');

            $table->foreign('personal_information_id', 'fk_personal_information_users')
                ->references('id')
                ->on('auth_user_personal_information')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auth_users', function (Blueprint $table) {
            $table->dropForeign('fk_personal_information_users');
            $table->dropColumn('personal_information_id');
        });
    }
};
