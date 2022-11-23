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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('progdi_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('nim')->comment('nomor_induk_mahasiswa');
            $table->string('nama');
            $table->integer('jenis_kelamin')->comment('1 laki_laki; 2 perempuan');
            $table->string('perguruan_tinggi');
            $table->string('semester_awal');
            $table->string('status_mahasiswa');
            $table->integer('status')->default(0)->comment('0 inactive; 1 active; 3 lulus;');
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
        Schema::dropIfExists('mahasiswa');
    }
};
