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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('kode_absen');
            $table->unsignedBigInteger('progdi_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('progdi_id')->references('id')->on('progdi');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('kelas_id')->references('id')->on('kelas');
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
        Schema::dropIfExists('absensis');
    }
};
