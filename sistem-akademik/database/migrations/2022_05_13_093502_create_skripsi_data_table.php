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
            $table->string('nik');
            $table->string('nim');
            $table->string('judul');
            $table->string('batas_akhir')->nullable();
            $table->string('file')->nullable();
            $table->integer('milestone')->nullable();
            $table->string("matakuliah");
            $table->boolean("is_accepted");
            $table->foreign('matakuliah')->references('kode')->on("matakuliah_data");
            $table->foreign('nik')->references('nomor_induk')->on("users_data");
            $table->foreign('nim')->references('nomor_induk')->on("users_data");
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
