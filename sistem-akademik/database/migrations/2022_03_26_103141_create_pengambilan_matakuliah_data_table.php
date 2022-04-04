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
        Schema::create('pengambilan_matakuliah_data', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_induk');
            $table->string('posisi_ambil');
            $table->bigInteger('id_kurikulum',false,true);
            $table->foreign('id_kurikulum')->references('id')->on("kurikulum_data");
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
        Schema::dropIfExists('pengambilan_matakuliah_data');
    }
};
