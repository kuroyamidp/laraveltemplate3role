<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_kelas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('kode_kelas');
            $table->unsignedBigInteger('progdi_id');
            $table->unsignedBigInteger('makul_id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('ruang_id');
            $table->time('start');
            $table->time('end');
            $table->double('limit_mahasiswa')->default(0);
            $table->integer('semester');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('progdi_id')->references('id')->on('progdi');
            $table->foreign('makul_id')->references('id')->on('mata_kuliah');
            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->foreign('ruang_id')->references('id')->on('ruang');
            $table->index('uid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_kelas');
    }
};
