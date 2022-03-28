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
        Schema::create('nilai_data', function (Blueprint $table) {
            $table->id();
            $table->float("nilai_1");
            $table->float("nilai_2");
            $table->float("nilai_3");
            $table->float("nilai_4");
            $table->float("nilai_5");
            $table->float("nilai_UAS");
            $table->float("nilai_akhir");
            $table->string("index");
            $table->string("nomor_induk");
            $table->foreign('nomor_induk')->references('nomor_induk')->on("mahasiswa_data");
            $table->bigInteger("id_kurikulum",false,true);
            $table->foreign('id_kurikulum')->references('id')->on("kurikulum_data");
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
        Schema::dropIfExists('nilai_data');
    }
};
