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
        Schema::create('ruang', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('kode_ruang');
            $table->string('nama')->comment('nama_ruang_kelas');
            $table->integer('status')->default(0)->comment('0 inactive; 1 active');
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
        Schema::dropIfExists('ruang');
    }
};
