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
        Schema::create('kurikulum_data', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->integer("semester"); // 0 = Ganjil; 1 = Genap
            $table->string("kelas")->nullable();
            $table->integer("jumlah_pertemuan");
            $table->string("kode_matakuliah");
            $table->foreign('kode_matakuliah')->references('kode')->on("matakuliah_data");
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
        Schema::dropIfExists('kurikulum_data');
    }
};
