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
        Schema::create('progdi', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('kode_progdi');
            $table->string('jenjang_studi');
            $table->string('nama_studi');
            $table->string('singkatan_studi')->nullable();
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
        Schema::dropIfExists('progdi');
    }
};
