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
        Schema::create('dosen_data', function (Blueprint $table) {
            $table->primary('nomor_induk');
            $table->string('nomor_induk');
            $table->string("program_studi");
            $table->string("bidang_ilmu");
            $table->string("gelar_akademik");
            $table->integer("status_ikatan_kerja"); // 0 = Dosen Tetap; 1 = Dosen Tidak Tetap / Honorer
            $table->integer("status_dosen");  // 0 = Aktif; 1 = Tidak aktif
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
        Schema::dropIfExists('dosen_data');
    }
};

