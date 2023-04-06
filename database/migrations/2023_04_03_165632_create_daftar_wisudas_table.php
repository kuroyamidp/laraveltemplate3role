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
        Schema::create('daftar_wisuda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('npm');
            $table->date('tanggal_sidang');
            $table->time('jam');
            $table->text('file');
            $table->text('doc');
            $table->timestamps();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_wisuda_models');
    }
};