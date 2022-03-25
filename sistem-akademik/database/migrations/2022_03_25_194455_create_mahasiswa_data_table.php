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
        Schema::create('mahasiswa_data', function (Blueprint $table) {
            $table->primary('nomor_induk');
            $table->string('nomor_induk');
            $table->string("jurusan");
            $table->integer("tahun_masuk");
            $table->integer("tahun_lulus");
            $table->foreign('nomor_induk')->references('nomor_induk')->on("users_data");
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
        Schema::dropIfExists('mahasiswa_data');
    }
};
