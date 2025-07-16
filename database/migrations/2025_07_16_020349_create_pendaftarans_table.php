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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->string('cv');
            $table->string('portofolio')->nullable();
            $table->string('universitas');
            $table->string('jurusan');
            $table->enum('jenjang', ['D3', 'S1', 'S2', 'S3']);
            $table->integer('semester');
            $table->string('bidang');
            $table->enum('periode', ['2 bulan', '3 bulan', '4 bulan', '5 bulan', '6 bulan']);
            $table->enum('status', ['Diterima', 'Ditolak', 'Menunggu']);
            $table->text('tujuan');
            $table->text('keahlian');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
