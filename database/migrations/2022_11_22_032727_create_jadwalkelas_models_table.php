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
        Schema::create('jadwal_kelas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->unsignedBigInteger('kelas_id');
            $table->string('hari');
            $table->integer('semester')->default(0);
            $table->date('periode');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kelas_id')->references('id')->on('daftar_kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kelas');
    }
};
