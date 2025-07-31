<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganMagangsTable extends Migration
{
    public function up(): void
    {
        Schema::create('lowongan_magangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // UI/UX DESIGNER INTERN
            $table->string('divisi'); // Divisi Product
            $table->string('lokasi'); // Solo / WFH / dll
            $table->date('deadline'); // Deadline apply
            $table->string('durasi')->nullable(); // Contoh: 3 Bulan, 6 Bulan
            $table->json('kualifikasi')->nullable(); // array: Mahasiswa aktif, Bisa Figma
            $table->text('deskripsi')->nullable(); // deskripsi umum lowongan
            $table->text('pendidikan')->nullable(); // D3/D4/S1 
            $table->json('persyaratan_dokumen')->nullable(); // array: CV, portofolio, dll
            $table->json('skill')->nullable(); // array: Bisa Figma, Canva, dll
            $table->json('tanggung_jawab')->nullable(); // array: wireframe, kolaborasi, dll
            $table->json('benefit')->nullable(); // array: sertifikat, mentor, dll
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongan_magangs');
    }
}
