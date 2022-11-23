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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('progdi_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('nama');
            $table->text('nidn')->comment('nomor_induk_dosen');
            $table->string('perguruan_tinggi');
            $table->integer('jenis_kelamin')->comment('1 laki_laki; 2 perempuan');
            $table->string('jabatan_fungsional')->nullable();
            $table->string('pendidikan_tertinggi')->nullable();
            $table->string('ikatan_kerja');
            $table->string('status');
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('progdi_id')->references('id')->on('progdi');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('dosen');
    }
};
