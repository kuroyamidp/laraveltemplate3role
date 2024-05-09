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
            $table->string('progdi_id');
            $table->string('mahasiswa_id');
            $table->string('kelas_id');
            $table->integer('status')->default(0)->comment('0 inactive; 1 active; 3 lulus;');
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
        Schema::dropIfExists('absensis');
    }
};
