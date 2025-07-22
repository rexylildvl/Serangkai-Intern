<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
 
    Schema::table('pendaftarans', function (Blueprint $table) {
        if (!Schema::hasColumn('pendaftarans', 'lowongan_id')) {
            $table->unsignedBigInteger('lowongan_id')->nullable()->after('keahlian');
            $table->foreign('lowongan_id')->references('id')->on('lowongans')->onDelete('cascade');
        }
    });
}


    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropForeign(['lowongan_id']);
            $table->dropColumn('lowongan_id');
        });
    }
};




