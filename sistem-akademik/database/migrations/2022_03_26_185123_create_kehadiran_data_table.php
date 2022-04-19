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
        Schema::create('kehadiran_data', function (Blueprint $table) {
            $table->id();
            $table->integer("keterangan"); // 0 = Hadir; 1 = Izin; 2 = Sakit; 3 = Alpha
            $table->bigInteger("id_pengambilan_matakuliah",false,true);
            $table->bigInteger("id_roster",false,true);
            $table->foreign('id_pengambilan_matakuliah')->references('id')->on("pengambilan_matakuliah_data");
            $table->foreign('id_roster')->references('id')->on("roster_data");
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
        Schema::dropIfExists('kehadiran_data');
    }
};
