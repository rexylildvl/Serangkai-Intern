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
        Schema::table('lowongan_magangs', function (Blueprint $table) {
            $table->enum('status', ['buka', 'tutup'])->default('buka');
        });
    }

    public function down(): void
    {
        Schema::table('lowongan_magangs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

};
