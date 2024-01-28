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
        Schema::create('auth_user_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('document_type_id');
            $table->string('document');
            $table->boolean('is_current')->default(0);

            $table->unique(['user_id', 'document_type_id', 'document'], 'unique_user_documents');
            $table->unique(['user_id', 'is_current'], 'unique_current_document');

            $table->foreign('user_id')
                ->references('id')
                ->on('auth_users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('document_type_id')
                ->references('id')
                ->on('setting_document_types')
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
        Schema::dropIfExists('auth_user_documents');
    }
};
