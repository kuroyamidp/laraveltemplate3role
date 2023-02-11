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
        Schema::create('data_pribadi_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('warga_negara')->default(0)->comment('1 WNI; 2 WNA');
            $table->double('no_ktp')->default(0);
            $table->double('nisn')->default(0);
            $table->string('gol_darah');
            $table->string('agama');
            $table->string('status_sipil');
            $table->text('telp');
            $table->text('no_hp');
            $table->string('email');
            $table->text('alamat');

            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->double('kode_pos');
            $table->double('rt')->default(0);
            $table->double('rw')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
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
        Schema::dropIfExists('data_pribadi_mahasiswa');
    }
};
