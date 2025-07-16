<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoeVideosTable extends Migration
{
    public function up()
    {
        Schema::create('coe_videos', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('video_path'); // path video lokal (disimpan di storage/public atau public/video)
            $table->timestamps(); // untuk created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('coe_videos');
    }
}
