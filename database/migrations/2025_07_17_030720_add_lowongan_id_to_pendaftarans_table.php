<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('pendaftarans', function (Blueprint $table) {
        $table->foreignId('id_lowongan')
              ->constrained('lowongan_magangs')
              ->onDelete('cascade')
              ->after('id'); // Letakkan setelah kolom 'id', atau sesuaikan letaknya
    });
}

public function down()
{
    Schema::table('pendaftarans', function (Blueprint $table) {
        $table->dropForeign(['id_lowongan']);
        $table->dropColumn('id_lowongan');
    });
}

};
