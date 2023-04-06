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
        Schema::create('jadwalujians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matkul_id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('ruang_id');
            $table->date('tanggal');
            $table->time('jam');
            $table->timestamps();

            $table->foreign('matkul_id')->references('id')->on('mata_kuliah');
            $table->foreign('dosen_id')->references('id')->on('dosen');
            $table->foreign('ruang_id')->references('id')->on('ruang');
            $table->index('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwalujians');
    }
};
