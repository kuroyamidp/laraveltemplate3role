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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('kode_mk');
            $table->string('nama')->comment('nama_mata_kuliah');
            $table->double('sks')->default(0);
            $table->double('bobot')->default(0);
            $table->double('mutu')->default(0)->comment('sks * bobot');
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
        Schema::dropIfExists('mata_kuliah');
    }
};
