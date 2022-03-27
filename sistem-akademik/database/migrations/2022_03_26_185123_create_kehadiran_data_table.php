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
            $table->string("keterangan");
            $table->string("pengguna");
            $table->bigInteger("id_roster",false,true);
            $table->foreign('pengguna')->references('nomor_induk')->on("users_data");
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
