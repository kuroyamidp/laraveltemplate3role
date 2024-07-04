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
        Schema::create('daftarkelas_models', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('kode_kelas');
            $table->string('progdi_id');
            $table->string('makul_id');
            $table->string('dosen_id');
            $table->string('ruang_id');
            $table->string('start');
            $table->string('hari');
            $table->integer('semester');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('daftarkelas_models');
    }
};
