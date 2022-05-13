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
        Schema::create('skripsi_data', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('batasAkhir');
            $table->string('file');
            $table->boolean("isTugasAkhir");
            $table->integer('milestone');
            $table->string("matakuliah");
            $table->foreign('matakuliah')->references('kode')->on("matakuliah_data");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skripsi_data');
    }
};
