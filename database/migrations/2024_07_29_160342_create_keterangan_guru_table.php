<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganGuruTable extends Migration
{
    public function up()
    {
        Schema::create('keterangan_guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('daftarkelas_id');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('daftarkelas_id')->references('id')->on('daftarkelas_models')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('keterangan_guru');
    }
}

