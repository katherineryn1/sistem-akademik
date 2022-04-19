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
        Schema::create('matakuliah_data', function (Blueprint $table) {
            $table->primary('kode');
            $table->string('kode');
            $table->string('nama');
            $table->integer("jenis"); // 0 = Umum; 1 = Keilmuan Keterampilan; 2 = Pengembangan Kepribadian; 3 = Keahlian Berkarya
            $table->integer("sifat"); // 0 = Wajib; 1 = Pilihan
            $table->integer("sks");
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
        Schema::dropIfExists('matakuliah_data');
    }
};
