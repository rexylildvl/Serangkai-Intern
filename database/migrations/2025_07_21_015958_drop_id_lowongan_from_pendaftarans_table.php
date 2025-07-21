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
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Drop foreign key constraint dulu
            $table->dropForeign(['id_lowongan']);
            // Baru drop kolomnya
            $table->dropColumn('id_lowongan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lowongan')->nullable();
        });
    }
};
